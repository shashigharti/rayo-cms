<?php
namespace Robust\Pages\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\CrudTrait;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Admin\Traits\ViewTrait;
use Robust\Pages\Models\Category;
use Robust\Pages\Repositories\Admin\CategoryRepository;

/**
 * Class CategoryController
 * @package Robust\Pages\Controllers\Admin
 */
class CategoryController extends Controller
{
    use CrudTrait, ViewTrait;

    /**
     * CategoryController constructor.
     * @param Request $request
     * @param CategoryRepository $category
     */
    public function __construct(
        Request $request,
        CategoryRepository $category
    ) {
        $this->model = $category;
        $this->request = $request;
        $this->ui = 'Robust\Pages\UI\Category';
        $this->package_name = 'pages';
        $this->view = 'admin.categories';
        $this->title = 'Page Categories';
        $this->redirect = 'admin.pagecategories';
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = $this->model->find($id);
        if ($category->pages->count()) {
            return redirect(route("{$this->redirect}.index"))->with('error',
                'You cannot delete category associated with one or more pages.');
        }
        $this->model->delete($id);
        return redirect(route("{$this->redirect}.index"))->with('message', 'Record was successfully deleted');
    }

    /**
     * @return $this
     */
    public function getImport()
    {
        return $this->display("{$this->package_name}::{$this->view}.import", []);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postImport(Request $request)
    {
        $data = $request->all();
        $name = 'categories_csv' . rand(500, 5000000) . '.csv';
        $imageName = $name;
        $data['file']->move(public_path('uploads'), $imageName);

        $file = fopen(public_path('uploads/') . $name, "r");
        while (!feof($file)) {
            $csv_data[] = fgetcsv($file);
        }
        foreach ($csv_data as $each_data) {
            if ($each_data[0] != "") {
                $category = Category::find($each_data['0']);

                if (isset($officer)) {
                    $category->name = $each_data['1'];
                    $category->name_ne = $each_data['2'];
                    $category->slug = $each_data['3'];
                    $category->description = $each_data['4'];
                    $category->description_ne = $each_data['5'];
                    $category->update();
                } else {
                    Category::create([
                        'name' => $each_data['1'],
                        'name_ne' => $each_data['2'],
                        'slug' => $each_data['3'],
                        'description' => $each_data['4'],
                        'description_ne' => $each_data['5'],
                    ]);
                }
            }
        }
        fclose($file);
        return redirect(route("admin.pagecategories.index"))->with('message', 'Categories successfully imported');
    }

    /**
     *
     */
    public function export()
    {
        $categories = Category::select(\DB::raw("id, name, name_ne, slug, description, description_ne"))->get();
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=categories.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, ['ID', 'Name', 'Name_ne', 'Slug', 'Description', 'Description_ne']);
        foreach ($categories as $each) {
            fputcsv($output, $each->toArray());
        }
        fclose($output);
    }
}
