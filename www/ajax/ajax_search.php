<?php
if (!empty($_POST['search'])) {
    $search = ($_POST['search']);
    require '../../vendor/autoload.php';

    $token = "7f0d510bc2c356e3dc66dcfd96b7c07edcef4ee0";
    $dadata = new \Dadata\DadataClient($token, null);
    $response = $dadata->suggest("address", $search);
    $result=[];
    foreach ($response as $res=>$value){
        $result []=$value ['value'];
    }

    if ($result) {
        ?>
        <div class="search_result">
            <table>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td class="search_result-name">
                            <a href="#"><?php echo $row; ?></a>
                        </td>
                        <td class="search_result-btn">
                            <a href="#">Перейти</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php
    }
}