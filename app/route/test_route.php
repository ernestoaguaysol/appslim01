<?php


use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\AuthValidation,
    App\Middleware\AuthMiddleware;
    
$app->group('/api/clientes', function () {

    $this->get('', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(json_encode($this->model->test->getAllDatas()));
    });

    $this->get('/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(json_encode($this->model->test->getData($args['id'])));
    });

    $this->post('', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(json_encode($this->model->test->insertData($req->getParsedBody())));
    });

    $this->put('/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(json_encode($this->model->test->updateData($args['id'], $req->getParsedBody())));
    });

    $this->delete('/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                        ->write(json_encode($this->model->test->deleteData($args['id'])));
    });
});