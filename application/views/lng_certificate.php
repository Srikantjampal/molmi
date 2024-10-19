<?php
$front_base_url = $this->config->item('front_base_url');
$base_url 		= $this->config->item('base_url');
$http_host 		= $this->config->item('http_host');
$base_url_views = $this->config->item('base_url_views');
$base_upload = $this->config->item('upload');
?>
<!DOCTYPE html>

<html lang="en">

	<head>

	 

<!--<link rel="preconnect" href="https://fonts.googleapis.com">-->

<!--<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->

<!--<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">-->

		<meta charset="UTF-8"/>

		<meta name="description" content="We are built on the foundation of belief and work to bring change to the lives of people and anyone who are deprived of the essentials of life. Visit Vastra!"/>

		<meta name="keywords" content="keywords"/>

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>

		<link rel="shortcut icon" href="img/favicon.ico"/>
		

		<title>Certificate</title>

		<!-- Latest compiled and minified CSS -->

<!-- Optional theme -->

<style>
#printBtn {
    cursor: pointer;
    position: absolute;
    right: 4%;
    background-color: #0060aa;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
}
	@media print {
     @page {
        margin-left: 0.4in;
        margin-right: 0.5in;
        margin-top: 0.2in;
        margin-bottom: 0;
      }
	#printBtn {
        display: none !important;
    }
}
	</style>

</head>

    <body style="font-family: 'times-new-roman-bold-italic' !important;font-size: 14px; line-height: 1.42857143; color: #333; background-color: #fff;margin: 0;padding:100px 0px 0px 0px;">
	<input type="button" id="printBtn" value="Print" onclick="window.print()">
     <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link rel="stylesheet" href="css/times-new-roman.css">

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

<div style="font-family:'Jost',sans-serif;padding-left: 10px; padding-right: 10px;background-color:white;display: block; padding: 0;overflow: hidden;">

    <div style="font-family: 'times-new-roman-bold-italic' !important;font-family:'Jost',sans-serif;max-width: 960px;padding-right: 10px; padding-left: 10px; margin-right: auto; margin-left: auto;display: block;">

        <div style="font-family: 'times-new-roman-bold-italic' !important;font-family:'Jost',sans-serif;justify-content: center!important; margin-right: -15px; margin-left: -15px;">

            <div style="font-family: 'times-new-roman-bold-italic' !important;flex: 0 0 auto; width: 99%;max-width: 99%; padding-right: calc(var(--bs-gutter-x) * .5); padding-bottom: 20px;background-color: #fff !important; float: left;position: relative; min-height: 1px;">

        

                    <img src="<?php echo $base_url_views;?>images/mol-logo.png" style="font-family: 'times-new-roman-bold-italic' !important;display: block; margin-left: auto; margin-right: auto; height: 40px; width: auto;vertical-align: middle;border: 0;"/>

                <p style="font-family: 'times-new-roman-bold-italic' !important;font-size: 12pt;margin-bottom: 10px;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-style: italic!important;text-align: left;margin-left: 330px;">No. : <?php echo $detail->certificate_no; ?></p> 

                <h3 style="font-family: 'times-new-roman-bold-italic' !important;text-align: center!important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 20pt;font-style: italic;line-height: 1.2;margin-top: 0;margin-bottom: 0.5rem;">CERTIFICATE OF TRAINING</h3>

                <p style="font-family: 'times-new-roman-bold-italic' !important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 14pt;font-style: italic!important;text-align: center!important;margin: 0 0 10px;"> This is to certify that</p>

                <p style="font-family: 'times-new-roman-bold-italic' !important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 14pt;font-style: italic!important;text-align: center!important;margin: 0 0 10px;"> Name: <?php echo $detail->caprefix; ?><?php if($detail->caprefix != ''){echo ".";} ?> <?php echo $detail->candidate_name; ?></p>
                
                <p style="font-family: 'times-new-roman-bold-italic' !important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 14pt;font-style: italic!important;text-align: center!important;margin: 30 0 30px;"> Date of Birth : <?php $strtotime1 =strtotime($detail->dob);echo date('d F, Y',$strtotime1); ?></p>
                
                <p style="font-family: 'times-new-roman-bold-italic' !important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 14pt;font-style: italic!important;text-align: center!important;margin: 0 0 10px;">has satisfactorily completed the</p>
              

                <!--<div style="font-family: 'times-new-roman-bold-italic' !important;display: flex!important;MARGIN-RIGHT: -120PX;margin-bottom: 10px;justify-content: center!important;">

                    <div style="font-family: 'times-new-roman-bold-italic' !important;padding-left: 10px;padding-right: 10px;display: block!important;">

                    <p style="font-family: 'times-new-roman-bold-italic' !important;margin-bottom: 50px;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 14pt;font-style: italic!important;text-align: center!important;margin: 0 0 10px;">Date of Birth : <?php $strtotime1 =strtotime($detail->dob);
										echo date('d F, Y',$strtotime1); ?></p>

                    

                    </div>-->
                    
                    <div style="border:1px dotted #0000005c;position:absolute;top:63%;left:75%;width: 100px;height: 100px;">
                    
					<?php if($detail->profile_image != ''){?>
                    <img src="<?php echo $front_base_url;?>upload/candidate/medium/<?php echo $detail->profile_image;?>" style="font-family: 'times-new-roman-bold-italic' !important;MARGIN-LEFT: 50PX;vertical-align: middle;border: 0;"/>
					<?php } ?>
                </div>
</div>
                

                <h3 style="font-family: 'times-new-roman-bold-italic' !important;margin-bottom: 10px;text-align: center!important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 20pt;font-style: italic;line-height: 1.2;margin-top: 0;text-transform: uppercase;"><?php echo $detail->course_name; ?></h3>

                <h4 style="font-family: 'times-new-roman-bold-italic' !important;font-size: 18pt;margin-bottom: 10px;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-style: italic!important;text-align: center!important;margin-top: 0;line-height: 1.2;">(<?php echo $detail->officer; ?> Officer - <?php echo $detail->course_level; ?> Level)</h4>

                <p style="font-family: 'times-new-roman-bold-italic' !important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 14pt;font-style: italic!important;text-align: center!important;margin: 0 0 10px;">Date of Commencement: <?php $strtotime2 =strtotime($detail->from_date);
														echo date('d F, Y',$strtotime2); ?></p>

                <p style="font-family: 'times-new-roman-bold-italic' !important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 14pt;font-style: italic!important;text-align: center!important;margin: 0 0 10px;">Date of Completion: <?php $strtotime3 =strtotime($detail->to_date);
														echo date('d F, Y',$strtotime3); ?></p>

               <!-- <p style="font-family: 'times-new-roman-bold-italic' !important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 14pt;font-style: italic!important;text-align: center!important;margin: 0 0 10px;"> Training Location : <?php echo $detail->location; ?> </p> -->

<p style="font-family: 'times-new-roman-bold-italic' !important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 14pt;font-style: italic!important;text-align: center!important;margin: 0 0 10px;"> Training Location : MOL Training Center (India) </p>



                <div style="font-family: 'times-new-roman-bold-italic' !important;display: block;">

                      <div style="font-family: 'times-new-roman-bold-italic' !important;padding-left: 80px;padding-right: 80px;margin-bottom: 10px;justify-content: center!important;">

                <h5 style="font-family: 'times-new-roman-bold-italic' !important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 14pt;font-style: italic!important;margin-top: 0;margin-bottom: 0.5rem;line-height: 1.2;">Content of Training:</h5>

                <?php 

                    //echo"<pre>";print_r($detail);echo"</pre>";
                ?>

                <?php if($detail->course_level == 'Management'){?>        
                <h5 style="font-family: 'times-new-roman-bold-italic' !important;    color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 13pt;font-style: italic!important;margin-top: 0;margin-bottom: 0.5rem;line-height: 1.2;margin-left: 20px;">This training is the LNG carrier standard training course that is intended to apply to seafarers classifying as the Management rank including the Master, which is certified by DNV-GL as compliant with the LNG Shipping suggested competency standards issued by SIGTTO and includes the Cargo simulator training.</h5>

                <?php } ?>

                <?php if($detail->course_level == 'Operational'){?>        
                <h5 style="font-family: 'times-new-roman-bold-italic' !important;    color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 13pt;font-style: italic!important;margin-top: 0;margin-bottom: 0.5rem;line-height: 1.2;margin-left: 20px;">This training is the LNG carrier standard training course that is intended to apply to seafarers classifying as the Operational rank, which is certified by DNV as compliant with the LNG Shipping suggested competency standards issued by SIGTTO and includes the Cargo simulator training.</h5>

                <?php } ?>

                    <h5 style="font-family: 'times-new-roman-bold-italic' !important;margin-top: 20px;margin-bottom: 10px;    color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 13pt;font-style: italic!important;line-height: 1.2;margin-left: 20px;">This certificate is valid for all LNG vessels related to Mitsui O.S.K Lines.

                        Organized by MOL Marine and Engineering Co., Ltd.</h5>

                        <h3 style="font-family: 'times-new-roman-bold-italic' !important;text-align: center!important;color: #000000;font-weight: 400;text-decoration: none;vertical-align: baseline;font-size: 20pt;font-style: italic;margin-top: 0;margin-bottom: 0.5rem;line-height: 1.2;">
                       <!---     <?php echo $detail->location; ?> -->
                       MOL Training Center (India)
                            </h3>

                        </div>

                                                <p style="font-family: 'times-new-roman-bold-italic' !important;color: #000000;font-weight: 600;text-decoration: none;vertical-align: baseline;font-size: 14pt;font-style: italic!important;text-align: center!important;margin: 0 0 10px;">Trainer : <?php echo $detail->tprefix; ?><?php if($detail->tprefix != ''){echo ".";} ?> <?php echo $detail->trainer_name; ?></p>

                        <div style="font-family: 'times-new-roman-bold-italic' !important;display: flex!important;justify-content: center!important;margin-right: 20px;">

                            <!--<img src="<?php echo $base_url_views;?>images/DNV-2.png" style="font-family: 'times-new-roman-bold-italic' !important;width: 110px;vertical-align: middle;border: 0;position: absolute;left: 12%;">-->
                            <?php if($detail->type == 'DNV-ST0029'){ ?>
                                                            <img src="<?php echo $base_url_views;?>images/DNV-ST0029.png" style="font-family: 'times-new-roman-bold-italic' !important;vertical-align: middle;border: 0;position: absolute;left: 12%;" >
                                                         <?php } else{ ?>
                                                            <img src="<?php echo $base_url_views;?>images/DNV-2.png" style="font-family: 'times-new-roman-bold-italic' !important;width: 110px;vertical-align: middle;border: 0;position: absolute;left: 12%;" >
                                                         <?php }?>
                            

                            <?php if($detail->digital_signature != '') {?>
                             <img src="<?php echo $front_base_url;?>upload/trainer/<?php echo $detail->digital_signature;?>" height="auto" style="font-family: 'times-new-roman-bold-italic' !important;border-bottom: 2px solid #000;vertical-align: middle;position: relative;width: 200px;margin-top: 40px;top: 84%;">

                             <?php } ?>
<img src="<?php echo $base_url_views;?>images/GlobalMET-Logo.jpg" style="font-family: 'Playfair Display', serif !important;width: 160px;vertical-align: middle;border: 0;height:55px;margin-top:40px;margin-right: 5px;position: absolute;right:12%">
                            <div style="font-family: 'times-new-roman-bold-italic' !important;display: block;">

                           

                        </div>

                        </div>

            </div>

            

              <div>

               

              </div> 



            </div>

            </div>

            </div>

        </div>

    </body>

</html>