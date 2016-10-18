<?php

namespace CodingTask\Http\Controllers;

use CodingTask\Clients;
use Illuminate\Http\Request;
use Session;
use Validator;
use View;

class ClientController extends Controller
{
    private static $viewData = [];
    private $clients;

    public function __construct()
    {
        self::$viewData['pageInfo'] = (object) [
            'title' => trans('general.client_page'),
        ];

        $this->clients = new Clients(storage_path('data/clients.csv'));
    }

    public function lists($page = 1)
    {
        $clients = $this->clients->all();

        $paginate = 5;
        $offSet = ($page * $paginate) - $paginate;
        $itemsForCurrentPage = array_slice($clients, $offSet, $paginate, true);
        $result = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($clients), $paginate, $page);
        $result = self::$viewData['clients'] = $result;

        return view('pages.client.list')
            ->with(self::$viewData);
    }

    public function form($id = null)
    {
        if (!is_null($id)) {
            $id = url_decrypt($id);
            self::$viewData['edit'] = $this->clients->find($id);
            self::$viewData['id'] = $id;
        }
        $response = [
                    'status'    => 'success',
                    'data'      => null,
                    'message'   => View::make('pages.client.form')->with(self::$viewData)->render(),
                ];

        return response(json_encode($response), 200)
            ->header('Content-Type', 'application/json');
    }

    public function add(Request $request)
    {
        $v = validator::make($request->all(), [
                'NAME'         => 'required',
                'GENDER'       => 'required',
                'PHONE'        => 'required',
                'EMAIL'        => 'required|email',
                'DEF_CONTACT'  => 'required',
                'ADDRESS'      => 'required',
                'NATIONALITY'  => 'required',
                'DOB'          => 'required',
                'EDUCATION'    => 'required',
            ]);

        if ($v->fails()) {
            // error
            $error = $v->messages();
            $form_errors = [];
            foreach ($_POST as $key => $value) {
                $errMsg = $error->first($key);
                if (!empty($errMsg)) {
                    $form_errors[] = [
                        'id'        => $key,
                        'message'   => $errMsg,
                    ];
                }
            }

            $response = [
                'status'    => 'error',
                'data'      => $form_errors,
                'message'   => 'form_error',
            ];
        } else {
            $insertData = [
                    'NAME'          => $request->NAME,
                    'GENDER'        => $request->GENDER,
                    'PHONE'         => $request->PHONE,
                    'EMAIL'         => $request->EMAIL,
                    'DEF_CONTACT'   => $request->DEF_CONTACT,
                    'ADDRESS'       => $request->ADDRESS,
                    'NATIONALITY'   => $request->NATIONALITY,
                    'DOB'           => $request->DOB,
                    'EDUCATION'     => $request->EDUCATION,
                ];
            $result = $this->clients->add($insertData);
            if (!$result) {
                Session::flash('error_msg', trans('general.client_add_error'));
                $response = [
                    'status'    => 'error',
                    'data'      => null,
                    'message'   => trans('general.client_add_error'),
                ];
            } else {
                Session::flash('success_msg', trans('general.client_add_success'));
                $response = [
                    'status'    => 'ok',
                    'data'      => null,
                    'message'   => 'success',
                ];
            }
        }

        return response(json_encode($response), 200)
            ->header('Content-Type', 'application/json');
    }

    public function update($id, Request $request)
    {
        $id = url_decrypt($id);
        $v = validator::make($request->all(), [
                'NAME'         => 'required',
                'GENDER'       => 'required',
                'PHONE'        => 'required',
                'EMAIL'        => 'required|email',
                'DEF_CONTACT'  => 'required',
                'ADDRESS'      => 'required',
                'NATIONALITY'  => 'required',
                'DOB'          => 'required',
                'EDUCATION'    => 'required',
            ]);

        if ($v->fails()) {
            // error
            $error = $v->messages();
            $form_errors = [];
            foreach ($_POST as $key => $value) {
                $errMsg = $error->first($key);
                if (!empty($errMsg)) {
                    $form_errors[] = [
                        'id'        => $key,
                        'message'   => $errMsg,
                    ];
                }
            }

            $response = [
                'status'    => 'error',
                'data'      => $form_errors,
                'message'   => 'form_error',
            ];
        } else {
            // validation success
            Session::flash('error_msg', trans('general.service_unavail'));
            $response = [
                'status'    => 'error',
                'data'      => null,
                'message'   => trans('general.service_unavail'),
            ];
        }

        return response(json_encode($response), 200)
            ->header('Content-Type', 'application/json');
    }

    public function delete($id)
    {
        Session::flash('error_msg', trans('general.service_unavail'));

        return redirect('client')->with('error_msg', trans('general.service_unavail'));
    }
}
