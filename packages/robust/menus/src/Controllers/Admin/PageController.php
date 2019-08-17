<?php
namespace Robust\Menus\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\CrudTrait;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Admin\Traits\ViewTrait;
use Robust\Core\Helpers\MenuHelper;
use Robust\Menus\Models\Page;
use Robust\Menus\Repositories\Admin\PageRepository;

/**
 * Class PageController
 * @package Robust\Pages\Controllers\Admin
 */
class PageController extends Controller
{
    use CrudTrait, ViewTrait;

    /**
     * PageController constructor.
     * @param Request $request
     * @param PageRepository $pages
     */
    public function __construct(
        Request $request,
        PageRepository $pages
    ) {
        $this->model = $pages;
        $this->request = $request;
        $this->ui = 'Robust\Pages\UI\Page';
        $this->package_name = 'pages';
        $this->view = 'admin.pages';
        $this->title = 'Pages';
    }


    /**
     * @param PagesRepository $page
     * @param $page_id
     * @return $this
     */
    public function getDownloadsByPage(PageRepository $page, $page_id)
    {
        $page = $page->find($page_id);
        $records = $page->downloads()->paginate();

        return $this->display($this->table,
            [
                'records' => $records,
                'package' => $this->package_name,
                'model' => $page,
                'child_ui' => new \Robust\Pages\UI\PageDownload
            ]
        );
    }

    /**
     * @param $id
     * @return $this
     */
    public function pagesByCategory($id)
    {
        $records = $this->model->where('category_id', $id)->paginate(settings('app-setting', 'pagination'));
        return $this->display('core::admin.layouts.sub-layouts.table',
            [
                'records' => $records,
                'primary_menu' => (new MenuHelper())->getPrimaryMenu($this->package_name),
                'title' => (isset($this->title)) ? $this->title : '',
                'package' => $this->package_name,
            ]
        );
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
        $name = 'pages_csv' . rand(500, 5000000) . '.csv';
        $imageName = $name;
        $data['file']->move(public_path('uploads'), $imageName);
        $file = fopen(public_path('uploads/') . $name, "r");
        while (!feof($file)) {
            $csv_data[] = fgetcsv($file);
        }
        foreach ($csv_data as $each_data) {
            if ($each_data[0] != "") {
                $page = Page::find($each_data['0']);
                if (isset($page)) {
                    $page->name = $each_data['1'];
                    $page->name_ne = $each_data['2'];
                    $page->slug = $each_data['3'];
                    $page->excerpt = $each_data['4'];
                    $page->excerpt_ne = $each_data['5'];
                    $page->content = $each_data['6'];
                    $page->content = $each_data['7'];
                    $page->category_id = $each_data['8'];
                    $page->updated_at = $each_data['9'];
                    $page->created_at = $each_data['10'];
                    $page->update();
                } else {
                    Page::create([
                        'name' => $each_data['1'],
                        'name_ne' => $each_data['2'],
                        'slug' => $each_data['3'],
                        'excerpt' => $each_data['4'],
                        'excerpt_ne' => $each_data['5'],
                        'content' => $each_data['6'],
                        'content_ne' => $each_data['7'],
                        'category_id' => $each_data['8'],
                        'created_at' => $each_data['9'],
                        'updated_at' => $each_data['10'],
                    ]);
                }
            }
        }
        fclose($file);
        return redirect(route("admin.pages.index"))->with('message', 'Pages successfully imported');
    }


    /**
     *
     */
    public function export()
    {
        $pages = Page::select(\DB::raw("id, name, name_ne, slug, excerpt, excerpt_ne, content, content_ne, category_id, created_at, updated_at"))->get();
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=pages.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, [
            'ID',
            'Name',
            'Name_ne',
            'Slug',
            'Excerpt',
            'Excerpt_ne',
            'Content',
            'Content_ne',
            'Category ID',
            'Created at',
            'Updated At'
        ]);
        foreach ($pages as $each) {
            fputcsv($output, $each->toArray());

        }
        fclose($output);
    }
}
