<?php 

class UserController extends Controller 
{
    /**
     * Obtém a lista de usuários
     *
     * @return void
     */
    public function listAction() 
    {
        $strErrorDesc = "";
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $arrQueryStringParams = $this->getQueryStringParams();

        if (strtoupper($requestMethod) == "GET") {
            try {
                $userModel = new UserModel();
                $intLimit = 5;

                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }

                $arrUsers = $userModel->getUsers($intLimit);
                $responseData = json_encode($arrUsers);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . "OPS! Algo deu errado, favor verificar.";
                $strErrorHeader = "HTTP/1.1 500 Internal Server Error";
            }
        } else {
            $strErrorDesc = "OPS! Este método não é suportado.";
            $strErrorHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        if (!$strErrorDesc) {
            $this->sendOutPut($responseData, ['Content-Type: application/json', 'HTTP/1.1 200 OK']);
        } else {
            $this->sendOutPut(
                json_encode(['error' => $strErrorDesc]), ['Content-Type: application/json', $strErrorHeader]
            );
        }
    }
}