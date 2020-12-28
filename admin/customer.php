<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    if(!isset($_GET['customerid']) || $_GET['customerid'] == NULL){
        echo "<scrip>window.location = 'inbox.php'</scrip>";
    }
    else{
        $id = $_GET['customerid'];
    }
    $cs = new customer();
    
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
               <div class="block copyblock"> 

                <?php
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while ($result = $get_customer->fetch_assoc()) {
                   
                ?>

                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>Name</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $result['Name']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $result['Address']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $result['City']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $result['Country']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $result['Zipcode']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $result['Phone']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $result['Email']; ?>" class="medium" />
                            </td>
                        </tr>
						
                    </table>
                    </form>

                <?php 
                        }
                    }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>