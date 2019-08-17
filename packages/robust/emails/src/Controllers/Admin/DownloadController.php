<?php
namespace Robust\Pages\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\CrudTrait;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Admin\Traits\ViewTrait;
use Robust\Pages\Models\PageDownload;
use Robust\Pages\Repositories\Admin\DownloadRepository;
use Robust\Pages\Repositories\Admin\PageRepository;

/**
 * Class DownloadController
 * @package Robust\Pages\Controllers\Admin
 */
class DownloadController extends Controller
{
    use CrudTrait, ViewTrait;

    /**
     * DownloadController constructor.
     * @param Request $request
     * @param DownloadRepository $page_download
     * @param PageRepository $page
     */
    public function __construct(
        Request $request,
        DownloadRepository $page_download,
        PageRepository $page
    ) {
        $this->model = $page_download;
        $this->request = $request;
        $this->ui = 'Robust\Pages\UI\PageDownload';
        $this->package_name = 'pages';
        $this->view = 'admin.downloads';
        $this->title = 'Page Downloads';
        $this->page = $page;
        $this->redirect = 'admin.page.downloads';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $redirect = isset($this->redirect) ? $this->redirect : $this->view;

        if ($request->has('referer')) {
            $this->previous_url = $request->get('referer');
        }

        $data = $request->all();
        $rules = with(new $this->ui)->addrules;
        $this->validate($request,
            $rules
        );
        $file = $request->file('file');
        $name = str_replace(' ', '-', strtolower($file->getClientOriginalName()));
        $fileName = $name;
        $file->move(public_path('files/new_files'), $fileName);
        $data['file'] = url('/files/new_files') . "/" . $fileName;

        $model = $this->model->store($data);
        if (isset($this->events['store'])) {
            $event = $this->events['store'];
            event(new $event($model));
        }

        if (isset($this->previous_url)) {
            return redirect($this->previous_url)->with('message', 'Saved!!');
        }

        return redirect(route("{$redirect}.index"))->with('message', 'Saved!!');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $redirect = isset($this->redirect) ? $this->redirect : $this->view;
        if ($request->has('referer')) {
            $this->previous_url = $request->get('referer');
        }

        $data = $request->all();
        $rules = with(new $this->ui)->editrules;
        $this->validate($request,
            $rules
        );

        $file = $request->file('file');
        $name = str_replace(' ', '-', strtolower($file->getClientOriginalName()));
        $fileName = $name;
        $file->move(public_path('files/new_files'), $fileName);
        $data['file'] = url('/files/new_files') . "/" . $fileName;

        $model = $this->model->update($id, $data);

        if (isset($this->events['update'])) {
            $event = $this->events['update'];
            event(new $event($model));
        }

        if (isset($this->previous_url)) {
            return redirect($this->previous_url)->with('message', 'Saved!!');
        }

        return redirect(route("{$redirect}.index"))->with('message', 'Saved!!');
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
        $name = 'downloads_csv' . rand(500, 5000000) . '.csv';
        $imageName = $name;
        $data['file']->move(public_path('uploads'), $imageName);
        $file = fopen(public_path('uploads/') . $name, "r");

        $row = 1;
        if ($file  !== FALSE) {
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                if($row == 1){
                    $row++;
                }
                $num = count($data);
                for ($c=0; $c < $num; $c++) {
                    $csv_data[] = fgetcsv($file);
                }
            }
        }


//        while (!feof($file)) {
//            $csv_data[] = fgetcsv($file);
//        }
        foreach ($csv_data as $each_data) {
            if ($each_data[0] != "") {
                $downloads = PageDownload::find($each_data['0']);
                if (isset($downloads)) {
                    $downloads->page_id = $each_data['1'];
                    $downloads->name = $each_data['2'];
                    $downloads->description = $each_data['3'];
                    $downloads->file = $each_data['4'];
                    $downloads->update();
                } else {
                    PageDownload::create([
                        'page_id' => $each_data['0'],
                        'name' => $each_data['1'],
                        'description' => $each_data['2'],
                        'file' => $each_data['3'],
                    ]);
                }
            }
        }
        fclose($file);
        return redirect(route("admin.pages.index"))->with('message', 'Downloads successfully imported');
    }
}
