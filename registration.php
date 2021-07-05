<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="./style/registration.css"> -->
    <link rel="stylesheet" href="./style/style_reg.css">
</head>
<body>
<div class="page-content">
  <div class="form-content" >
      <div class="wizard-form" >
          <!-- მარცხენა ნაწილი -->
      <div class="vertical-steps">
                    <ul><li id="step-1"><a href="#">
                            <h2>
                                <p class="step-icon new-step-icon" id="step-icon-1"><span>01</span></p>
			                    <span class="step-text new-step-text" id="step-text-1">პირადი რეგისტრაცია</span>
                            </h2>
                            </a></li>
                <li id="step-2"> <a href="#">
                    <h2>
                    <p class="step-icon" id="step-icon-2"><span>02</span></p>
			        <span class="step-text" id="step-text-2">ძაღლსაშენის რეგისტრაცია</span>
                    </h2>
                    </a></li></ul>
                  </div>
                  <!-- სარეგისტრაციაო ფორმა -->
                  <div class="form">
          <form class="form-register" id="section_1" action="upload.php" method="post" enctype="multipart/form-data">
              <div class="form-total">
                  <!-- პირველი სექცია -->
                  <section >
                      <div class="inner">
                          <!-- სარეგისტრაციაოს სათაუერი, აღწერა -->
                          <div class="wizard-header">
                            <h3 class="heding-text">პირადი რეგისტრაციის ფორმა</h3>
                            <p>გთხოვთ შეავსოთ თქვენი პირადი ინფორმაცია 
                                აუცილებელია ყველა ველის შევსება!!! </p>
                          </div>
                          <!-- სახელის ველი -->
                          <div class="form-row">
                              <div class="form-holder">
                                  <fieldset>
                                      <legend>სახელი</legend>
                                      <input type="text" class="form-control" id="first-name" name="firstname" placeholder="სახელი" 
                                      value="<?php if(isset($_SESSION['old_name'])){echo trim( $_SESSION['old_name']);}?>"
                                      >
                                  </fieldset>
                                  <label for="first-name" class="error_M" id="error_M_f-n">
                                      <?php 
                                          if(isset($_SESSION['name-error'], $_SESSION['name-validate-error'])){
                                                echo $_SESSION['name-error'];
                                                echo $_SESSION['name-validate-error'];} 
                                            ?>
                                      </label>
                              </div>
                              <!-- გვარის ველი -->
                              <div class="form-holder">
                                  <fieldset>
                                      <legend>გვარი</legend>
                                      <input type="text" class="form-control" id="last-name" name="lastname" placeholder="გვარი" 
                                      value="<?php 
                                      if(isset($_SESSION['old_lastname'])){echo trim($_SESSION['old_lastname']);}
                                      ?>">
                                  </fieldset>
                                  <label for="last-name" class="error_M" id="error_M_l-n">
                                      <?php 
                                      if(isset($_SESSION['lastname-error'], $_SESSION['lastname-validate-error'])){
                                          echo $_SESSION['lastname-error'];
                                          echo $_SESSION['lastname-validate-error'];} ?>
                                      </label>
                              </div>
                          </div>
                          <!-- მისამართის ველი -->
                          <div class="form-row">
                              <div class="form-holder form-holder-2">
                                  <fieldset>
                                      <legend>თქვენი მისამართი</legend>
                                      <input type="text" class="form-control" id="address" name="address" placeholder="მისამართი"
                                      value="<?php 
                                      if(isset($_SESSION['old_address'])){echo trim($_SESSION['old_address']);}
                                      ?>">
                                  </fieldset>
                                  <label for="address" class="error_M" id="error_M_a">
                                      <?php if(isset($_SESSION['address-error'])){echo $_SESSION['address-error'];} ?>
                                      </label>
                              </div>
                          </div>
                          <!-- ტელეფონის ნომერის ველი -->
                          <div class="form-row">
                              <div class="form-holder form-holder-2">
                                  <fieldset>
                                      <legend>ტელეფონის ნომერი</legend>
                                      <input type="text" class="form-control" id="phone" name="phone" placeholder="555999333" 
                                      value="<?php if(isset($_SESSION['old_phone'])){echo trim($_SESSION['old_phone']);}?>">
                                  </fieldset>
                                  <label for="phone" class="error_M" id="error_M_p">
                                      <?php if(isset($_SESSION['phone-error'], $_SESSION['number-validate-error'], )){
                                          echo $_SESSION['phone-error'];
                                          echo $_SESSION['number-validate-error'];
                                          }?>
                                      </label>
                              </div>
                          </div>
                          <!-- დაბადების დღის ველი -->
                          <div class="form-row form-row-date">
                              <div class="form-holder form-holder-2">
                                  <fieldset>
                                      <legend>დაბადების თარიღი</legend>
                              <input id="date" type="date" name="date" 
                              value="<?php 
                                      if(isset($_SESSION['old_date'])){echo $_SESSION['old_date'];}
                                      ?>">
                              </fieldset>
                              <label for="" class="error_M" id="error_M_d">
                                  <?php if(isset($_SESSION['date-error'])){
                                          echo $_SESSION['date-error'];} ?>
                                      </label>
                              </div>
                          </div>
                            <!-- სქესის ველი -->
                          <div class="form-row">
                              <div class=" form-holder-2 radio">
                                  <label for="" class="special-label" >სქესი:</label>
                                  <input id="MaleG" type="radio" name="gender" value="1"
                                  <?php if (isset($gender) && $gender=="male") echo "checked";?> >
                                  <label for="MaleG">კაცი</label>
                                  <input id="FamelG" type="radio" name="gender" value="2"
                                  <?php if (isset($gender) && $gender=="female") echo "checked";?>>
                                  <label for="FamaleG">ქალი</label>
                                  <input id="OtherG" type="radio" name="gender" value="3"
                                  <?php if (isset($gender) && $gender=="other") echo "checked";?>>
                                  <label for="OtherG">სხვა</label>
                                  <label for="gender" class="error_M" id="error_M_g">
                                      <?php if(isset($_SESSION['gender-error'])){
                                          echo $_SESSION['gender-error'];} ?>
                                      </label>
                              </div>
                              
                          </div>
                          <!-- მაილის ველი -->
                          <div class="form-row">
                            <div class="form-holder form-holder-2">
                            <fieldset>
                                <legend>თქვენი მაილი</legend>
                                <input type="email" class="form-control" id="your-email" name="email" placeholder="example@gmail.com"
                                value="<?php 
                                      if(isset($_SESSION['old_email'])){echo trim($_SESSION['old_email']);}
                                      ?>">
                            </fieldset>
                            <label for="your-email" class="error_M" id="error_M_e">
                                      <?php if(isset($_SESSION['email-error'], $_SESSION['email-validate-error'])){
                                          echo $_SESSION['email-error'];
                                          echo $_SESSION['email-validate-error'];} ?>
                                      </label>
                            </div>
                        </div>
                        <!-- პაროლის ველი -->
                        <div class="form-row">
                              <div class="form-holder">
                                  <fieldset>
                                      <legend>პაროლი</legend>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="(A-Z)(a-z)(0-9)(!@)" 
                                      value="<?php if(isset($_SESSION['old_password'])){echo trim($_SESSION['old_password']);}?>"
                                        >
                                  </fieldset>
                                  <label for="password" class="error_M" id="error_M_pass">
                                      <?php if(isset($_SESSION['password-error'], $_SESSION['length-validate-error'])){
                                          echo $_SESSION['password-error'];
                                          echo $_SESSION['length-validate-error'];} ?>
                                      </label>
                              </div>
                              <div class="form-holder">
                                  <fieldset>
                                      <legend>გაიმეორეთ პაროლი</legend>
                                  <input type="password" class="form-control" id="repeat-password" name="repeat-password" placeholder="A-Z,a-z,0-9,!@" 
                                  value="<?php if(isset($_SESSION['old_repeat_password'])){echo trim($_SESSION['old_repeat_password']);}?>">
                                  </fieldset>
                                  <label for="password" class="error_M" id="error_M_repeat_pass">
                                      <?php if(isset($_SESSION['repeat-password-error'])){
                                          echo $_SESSION['repeat-password-error'];
                                          }
                                          if(isset($_SESSION['check-password-error'])){
                                            echo $_SESSION['check-password-error'];
                                             } ?>
                                      </label>
                              </div>
                          </div> 
                          <!-- გადამსვლეი ღილაკი -->
                          <div class="form-row">
                              <div class="form-holder form-holder-2">
                              <button id="SubmitBtn" type="submit"><i class="fa fa-arrow-right"></i></button>
                              </div>
                          </div> 
                     </div>
                  </section>
                  </div>
                </form>
            </div>      
     <!-- ძაღლსაშენის ნაწილი -->
         <div class="form_2">
          <form class="form-register  section_hidden"  id="section_2" action="kennel_upload.php" method="post" enctype="multipart/form-data">
          <div class="form-total">
<section >
                      <div class="inner">
                          <!-- სარეგისტრაციაოს სათაუერი, აღწერა -->
                          <div class="wizard-header">
                            <h3 class="heding-text">ძაღლსაშენის სარეგისტრაციო ფორმა</h3>
                            <p>გთხოვთ შეავსოთ თქვენი და თქვენი ძაღლსაშენის ინფორმაცია 
                                აუცილებელია ყველა ველის შევსება!!! </p>
                          </div>
                         
                          <!-- სახელის ველი -->
                          <fieldset class="kennel_fieldset">
                              <legend>მფლობელის პირადი ინფორმაცია</legend>
                          <div class="form-row">
                              <div class="form-holder">
                                  <fieldset>
                                      <legend>სახელი</legend>
                                      <input type="text" class="form-control" id="first-name" name="firstname" placeholder="სახელი" 
                                      value="<?php if(isset($_SESSION['old_name'])){echo trim( $_SESSION['old_name']);}?>"
                                      >
                                  </fieldset>
                                  <label for="first-name" class="error_M" id="error_M_f-n">
                                      <?php 
                                          if(isset($_SESSION['kennel-name-error'], $_SESSION['name-validate-error'])){
                                                echo $_SESSION['kennel-name-error'];
                                                echo $_SESSION['name-validate-error'];} 
                                            ?>
                                      </label>
                              </div>
                              <!-- გვარის ველი -->
                              <div class="form-holder">
                                  <fieldset>
                                      <legend>გვარი</legend>
                                      <input type="text" class="form-control" id="last-name" name="lastname" placeholder="გვარი" 
                                      value="<?php 
                                      if(isset($_SESSION['old_lastname'])){echo trim($_SESSION['old_lastname']);}
                                      ?>">
                                  
                                  <label for="last-name" class="error_M" id="error_M_l-n">
                                      <?php 
                                      if(isset($_SESSION['lastname-error'], $_SESSION['lastname-validate-error'])){
                                          echo $_SESSION['lastname-error'];
                                          echo $_SESSION['lastname-validate-error'];} ?>
                                      </label>
                              </div>
                          </div>
                          <!-- მისამართის ველი -->
                          <div class="form-row">
                              <div class="form-holder form-holder-2">
                                  <fieldset>
                                      <legend>თქვენი მისამართი</legend>
                                      <input type="text" class="form-control" id="address" name="address" placeholder="მისამართი"
                                      value="<?php 
                                      if(isset($_SESSION['old_address'])){echo trim($_SESSION['old_address']);}
                                      ?>">
                                  </fieldset>
                                  <label for="address" class="error_M" id="error_M_a">
                                      <?php if(isset($_SESSION['address-error'])){echo $_SESSION['address-error'];} ?>
                                      </label>
                              </div>
                          </div>
                          
                          <!-- ტელეფონის ნომერის ველი -->
                          <div class="form-row">
                              <div class="form-holder form-holder-2">
                                  <fieldset>
                                      <legend>ტელეფონის ნომერი</legend>
                                      <input type="text" class="form-control" id="phone" name="phone" placeholder="555999333" 
                                      value="<?php if(isset($_SESSION['old_phone'])){echo trim($_SESSION['old_phone']);}?>">
                                  </fieldset>
                                  <label for="phone" class="error_M" id="error_M_p">
                                      <?php if(isset($_SESSION['phone-error'], $_SESSION['number-validate-error'], )){
                                          echo $_SESSION['phone-error'];
                                          echo $_SESSION['number-validate-error'];
                                          }?>
                                      </label>
                              </div>
                          </div>
                          <!-- დაბადების დღის ველი -->
                          <div class="form-row form-row-date">
                              <div class="form-holder form-holder-2">
                                  <fieldset>
                                      <legend>დაბადების თარიღი</legend>
                              <input id="date" type="date" name="date" 
                              value="<?php 
                                      if(isset($_SESSION['old_date'])){echo $_SESSION['old_date'];}
                                      ?>">
                              </fieldset>
                              <label for="" class="error_M" id="error_M_d">
                                  <?php if(isset($_SESSION['date-error'])){
                                          echo $_SESSION['date-error'];} ?>
                                      </label>
                              </div>
                          </div>
                            <!-- სქესის ველი -->
                          <div class="form-row">
                              <div class=" form-holder-2 radio">
                                  <label for="" class="special-label" >სქესი:</label>
                                  <input id="MaleG" type="radio" name="gender" value="1"
                                  <?php if (isset($gender) && $gender=="male") echo "checked";?> >
                                  <label for="MaleG">კაცი</label>
                                  <input id="FamelG" type="radio" name="gender" value="2"
                                  <?php if (isset($gender) && $gender=="female") echo "checked";?>>
                                  <label for="FamaleG">ქალი</label>
                                  <input id="OtherG" type="radio" name="gender" value="3"
                                  <?php if (isset($gender) && $gender=="other") echo "checked";?>>
                                  <label for="OtherG">სხვა</label>
                                  <label for="gender" class="error_M" id="error_M_g">
                                      <?php if(isset($_SESSION['gender-error'])){
                                          echo $_SESSION['gender-error'];} ?>
                                      </label>
                              </div>
                          </div>
                          </fieldset>

                          <fieldset class="kennel_fieldset">
                              <legend>ინფორმაცია ძაღლსაშენის შესახებ</legend>
                            <!-- ძაღლსაშენის სახელის ველი -->
                          <div class="form-row">
                              <div class="form-holder form-holder-2">
                                  <fieldset>
                                      <legend>სახელი</legend>
                                      <input type="text" class="form-control" id="kennel_name" name="kennel_name" placeholder="ძაღლსაშენის სახელი"
                                      value="<?php 
                                    //   if(isset($_SESSION['old_address'])){echo trim($_SESSION['old_address']);}
                                      ?>">
                                  </fieldset>
                                   <label for="address" class="error_M" id="error_M_a">
                                      <?php 
                                      if(isset($_SESSION['address-error'])){echo $_SESSION['address-error'];} 
                                      ?>
                                      </label> 
                              </div>
                          </div>

                          <div class="form-row">
                              <div class="form-holder form-holder-2">
                                  <fieldset>
                                      <legend>ძაღლის ჯიში</legend>
                                      <input type="text" class="form-control" id="kennel_dog" name="kennel_dog" placeholder="ძაღლის ჯიში"
                                      value="<?php 
                                    //   if(isset($_SESSION['old_address'])){echo trim($_SESSION['old_address']);}
                                      ?>">
                                  </fieldset>
                                  <label for="kennel_dog" class="input_label">მიუთითეთ იმ ძაღლის ჯიში რომელი ჯიშსაც ამრავლებთ თქვენს ძაღლსაშენში</label>
                                   <label for="address" class="error_M" id="error_M_a">
                                      <?php 
                                       if(isset($_SESSION['address-error'])){echo $_SESSION['address-error'];} 
                                      ?>
                                      </label> 
                              </div>
                          </div>

                          <div class="form-row">
                              <div class="form-holder form-holder-2">
                                  <fieldset>
                                      <legend>მისამართი</legend>
                                      <input type="text" class="form-control" id="kennel_address" name="kennel_address" placeholder="ძაღლსაშენის მისამართი"
                                      value="<?php 
                                    //   if(isset($_SESSION['old_address'])){echo trim($_SESSION['old_address']);}
                                      ?>">
                                  </fieldset>
                                   <label for="address" class="error_M" id="error_M_a">
                                      <?php if(isset($_SESSION['address-error'])){echo $_SESSION['address-error'];} ?>
                                      </label> 
                              </div>
                          </div>
                          <!-- მაილის ველი -->
                          <div class="form-row">
                            <div class="form-holder form-holder-2">
                            <fieldset>
                                <legend>მაილი</legend>
                                <input type="email" class="form-control" id="your-email" name="email" placeholder="example@gmail.com"
                                value="<?php 
                                      if(isset($_SESSION['old_email'])){echo trim($_SESSION['old_email']);}
                                      ?>">
                            </fieldset>
                            <label for="your-email" class="error_M" id="error_M_e">
                                      <?php if(isset($_SESSION['email-error'], $_SESSION['email-validate-error'])){
                                          echo $_SESSION['email-error'];
                                          echo $_SESSION['email-validate-error'];} ?>
                                      </label>
                            </div>
                        </div>
                                        <!-- საკონტაქტო ნომერი -->
                        <div class="form-row">
                              <div class="form-holder form-holder-2">
                                  <fieldset>
                                      <legend>საკონტაქტო ნომერი</legend>
                                      <input type="text" class="form-control" id="phone" name="phone" placeholder="555999333" 
                                      value="<?php if(isset($_SESSION['old_phone'])){echo trim($_SESSION['old_phone']);}?>">
                                  </fieldset>
                                  <label for="phone" class="error_M" id="error_M_p">
                                      <?php if(isset($_SESSION['phone-error'], $_SESSION['number-validate-error'], )){
                                          echo $_SESSION['phone-error'];
                                          echo $_SESSION['number-validate-error'];
                                          }?>
                                      </label>
                              </div>
                          </div>
                        </fieldset>
                        <!-- პაროლის ველი -->
                        <div class="form-row">
                              <div class="form-holder">
                                  <fieldset>
                                      <legend>პაროლი</legend>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="(A-Z)(a-z)(0-9)(!@)" 
                                      value="<?php if(isset($_SESSION['old_password'])){echo trim($_SESSION['old_password']);}?>"
                                        >
                                  </fieldset>
                                  <label for="password" class="error_M" id="error_M_pass">
                                      <?php if(isset($_SESSION['password-error'], $_SESSION['length-validate-error'])){
                                          echo $_SESSION['password-error'];
                                          echo $_SESSION['length-validate-error'];} ?>
                                      </label>
                              </div>
                              <div class="form-holder">
                                  <fieldset>
                                      <legend>გაიმეორეთ პაროლი</legend>
                                  <input type="password" class="form-control" id="repeat-password" name="repeat-password" placeholder="A-Z,a-z,0-9,!@" 
                                  value="<?php if(isset($_SESSION['old_repeat_password'])){echo trim($_SESSION['old_repeat_password']);}?>">
                                  </fieldset>
                                  <label for="password" class="error_M" id="error_M_repeat_pass">
                                      <?php if(isset($_SESSION['repeat-password-error'])){
                                          echo $_SESSION['repeat-password-error'];
                                          }
                                          if(isset($_SESSION['check-password-error'])){
                                            echo $_SESSION['check-password-error'];
                                             } ?>
                                      </label>
                              </div>
                          </div> 
                          <!-- გადამსვლეი ღილაკი -->
                          <div class="form-row">
                              <div class="form-holder form-holder-2">
                              <button id="SubmitBtn" type="submit"><i class="fa fa-arrow-right"></i></button>
                              </div>
                          </div> 
                            </div>
                        </section>
                    </div>
                </form>
            </div>           
        </div>
    </div>
 </div>



   <!-- <script src="./js/option++.js"></script> -->
   <script src="./js/RegMain.js"></script>
    
</body>
</html>