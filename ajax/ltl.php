<?php
session_start();
if (isset($_SESSION['user_login'])) {

    require_once('../../../Connections/connect.php');
    include "../../../controllers/settings.php";
    include "../../../controllers/function.php";


    $msg = '';

    if(isset($_POST['requester']) and trim($_POST['requester']) != '') {
        // Подключение файла с классом
        require_once('../controllers/dl.php');

        $appKey = $set_dellin_key;
        $client = new DLClient($appKey);
        $client->auth($set_dellin_login, $set_dellin_pwd);

        $arrivalDate = !empty($_POST['arrival_date']) && trim($_POST['arrival_date']) !== ""
            ? date('Y-m-d', strtotime(str_replace('.', '-', $_POST['arrival_date']))) :
            date('Y-m-d', strtotime(str_replace('.', '-', date('Y-m-d')))) ;

        $derivalDate = !empty($_POST['derival_date']) && trim($_POST['derival_date']) !== ""
            ? date('Y-m-d', strtotime(str_replace('.', '-', $_POST['derival_date']))) :
            date('Y-m-d', strtotime(str_replace('.', '-', date('Y-m-d', strtotime("+1 days"))))) ;

        $data = [
                    "inOrder" => false,

                    "delivery" => [

                        "deliveryType" => [
                            "type" => "auto"
                        ],

                        "derival" => [

                            "produceDate" => $derivalDate,

                            "variant" => "address",

                            "address" => [
                                "search" => "Пермь, Васильева, 5Д, корп 2",
                            ],

                            "time" => [
                                "worktimeStart" => "09:00",
                                "worktimeEnd" => "18:00",
                            ],

                        ],

                        "arrival" => [
                            "variant" => "terminal",
                            "terminalID" => $_POST['terminal'],
                        ],
//                        "smsback" => "79213332211",
//                        "comment" => "комментарий к отправке"
                    ],

                    "members" => [
                        "requester" => [
                            "role" => "payer",
                            "uid" => $_POST['requester']
                        ],
                        "sender" => [
                            "counteragent" => [
                                "Form" => "0xbc1e63c5f81187e244490a5afd657cbd",
                                "name" => "Зенова",
                                "inn" => "5904214982"
                            ],
                            "contactPersons" => [
                                ["name" =>"Иван Иванович"],
                            ],
                            "phoneNumbers" => [
                                ["number" => "79213332211",
                                "ext" => "0123"],
                            ]
                        ],
                        "receiver" => [
                            "counteragent" => [
                                "Form" => $_POST['receiver_opf'],
                                "name" => $_POST['receiver_name'],
                                "inn" => $_POST['receiver_inn']
                            ],
                            "contactPersons" => [
                                ["name" => $_POST['contact_person']],
                            ],
                            "phoneNumbers" => [
                                ["number" => $_POST['contact_phone'],
                                    "ext" => "0123"],
                            ]
                        ],
                    ],
                    "cargo" => [
                        "quantity" =>  !empty($_POST['quantity']) && trim($_POST['quantity']) !== "" ? $_POST['quantity'] : "1",
                        "length" =>  !empty($_POST['length']) && trim($_POST['length']) !== "" ? $_POST['length'] : "0.3",
                        "width"=> !empty($_POST['width']) && trim($_POST['width']) !== "" ? $_POST['width'] : "0.21",
                        "weight" =>  !empty($_POST['total-weight']) && trim($_POST['total-weight']) !== "" ? $_POST['total-weight'] : "0.5",
                        "height"=>!empty($_POST['height']) && trim($_POST['height']) !== "" ? $_POST['height'] : "0.01",
                        "totalVolume" => !empty($_POST['total-volume']) && trim($_POST['total-volume']) !== "" ? $_POST['total-volume'] : "0.001",
                        "totalWeight" =>  !empty($_POST['total-weight']) && trim($_POST['total-weight']) !== "" ? $_POST['total-weight'] : "0.5",
                        "hazardClass" => !empty($_POST['hazard-class'])  && trim($_POST['hazard-class']) !== "" ? $_POST['hazard-class'] : "0",
                        "freightName" => "Мешок конфет"
                    ],

                    "payment" => [
                        "type" => "cash",
                        "primaryPayer" => "sender"
                    ],
                ];


        $client->request('v2/request', $data);

        $result = json_decode(json_encode($client->result), true);


    }

    if (isset($result)) {

        print_r($result);

        if(isset($result["errors"])){

            $errors = $result["errors"];

            $msg = '<div class="row mt50" style="margin-bottom:10px;">
            <div class="col-lg-12">
                <p><strong>Информация по отправке груза ТК Деловые линии </strong></p>';

            foreach ($errors as $error) {
                $msg .= '<p><strong>Ошибка:</strong> ' . $error['detail']. ' </p>';
            }

            $msg .= '</div>
        </div>';

        } else {

            $requestID = $result["data"]["requestID"];

            $msg = '<div class="row mt50" style="margin-bottom:10px;">
                        <div class="col-lg-12">
						<p><strong> Заявка на перевозку сборного груза отправлена </strong></p>
						<p><strong>Номер запроса:</strong> ' . $requestID . '</p>
						</div>
			    </div>';

        }


    }


    if (isset($result)) {

        echo json_encode(array(

            'msg' => $msg

        ), JSON_UNESCAPED_UNICODE);

    }

}