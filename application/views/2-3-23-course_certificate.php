<?php
$front_base_url = $this->config->item('front_base_url');
$base_url 		= $this->config->item('base_url');
$http_host 		= $this->config->item('http_host');
$base_url_views = $this->config->item('base_url_views');
$base_upload = $this->config->item('upload');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Certificate</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
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
   </style>
   <?php if($detail->show_logo == 1){ ?>
      <style>
      @media print {
         @page {
            margin-left: 0.4in;
            margin-right: 0.5in;
            margin-top: 0.05in;
            margin-bottom: 0;
         }
	      #printBtn {
            display: none !important;
         }
      }
	   </style>
   <?php } else { ?>
      <style>
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
   <?php } ?>
</head>
<body>
<!-- partial:index.partial.html -->
<div data-template-type="html" style="height: auto; padding-bottom: 30px;padding-top: 30px;" class="ui-sortable">
<input type="button" id="printBtn" value="Print" onclick="window.print()">
   <!--[if !mso]><!-->
   <!--<![endif]-->
   <table align="center" class="full" border="0" style="border: 1px solid #333; background-image:url(<?php echo $base_url_views;?>images/navy.jpg); background-size:cover; background-position:center;margin-top:40px;" cellpadding="0" cellspacing="0" data-module="Module-7" data-bgcolor="M7 Bgcolor 1">
   
   <tbody>
         <tr>
            <td>
   <!-- ====== Module : MOL header with logo and QR code ====== -->
   <table align="center" class="full" border="0" cellpadding="0" cellspacing="0" data-module="Module-7" data-bgcolor="M7 Bgcolor 1">
      <tbody>
         <tr>
            <td>
               <table width="1000" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M7 Bgcolor 2">
                  <tbody>
                     <tr>
                        <td>
                           <table width="1000" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">
                              <tbody>
                                 <tr>
                                    <td height="40" style="font-size:0px">&nbsp;</td>
                                 </tr>
                                    
                                 <!-- column x3 -->
                                 <tr>
                                    <td>
                                       <table class="full" width="900px" align="center" border="0" cellpadding="0" cellspacing="0">
                                          <tbody>
                                             <tr>
                                                <td valign="top">
                                                   <!-- left column -->
                                                   <table style="overflow: hidden; border-radius: 4px;" width="700" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                      <!-- image -->
                                                      <tbody>
                                                         <tr>
                                                            <td height="40" style="font-size:0px">&nbsp;</td>
                                                         </tr>
                                                         <tr>
                                                            <td>
                                                               <img width="188" style="width: 100%; display: block; line-height: 0px; font-size: 0px; border: 0px;" src="<?php echo $base_url_views;?>src/img/certificate-logo.jpg">
                                                            </td>
                                                         </tr>
                                                         <!-- image end -->
                                                        
                                                      </tbody>
                                                   </table>
                                                   <!-- left column end -->
                                                   <!--[if (gte mso 9)|(IE)]>
                                                </td>
                                                <td>
                                                   <![endif]-->
                                                   <table width="15" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                      <tbody>
                                                         <tr>
                                                            <td height="20" style="font-size:0px">&nbsp;</td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <!--[if (gte mso 9)|(IE)]>
                                                </td>
                                                <td valign="top">
                                                   <![endif]-->
                                                   <!-- middle column -->
                                                   
                                                   <!-- middle column end -->
                                                   <!--[if (gte mso 9)|(IE)]>
                                                </td>
                                                <td>
                                                   <![endif]-->
                                                   <table width="15" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                      <tbody>
                                                         <tr>
                                                            <td height="20" style="font-size:0px">&nbsp;</td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <!--[if (gte mso 9)|(IE)]>
                                                </td>
                                                <td valign="top">
                                                   <![endif]-->
                                                   <!-- right column -->
                                                   <table style="overflow: hidden; border-radius: 4px;" width="150" align="right" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                      <!-- image -->
                                                      <tbody>
                                                         
                                                         <tr>
                                                            <td>
                                                            <?php
                                                               $string1 = $base_url."authenticity-verification/".$detail->cid;
                                                               $google_chart_api_url = "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=".$string1."&choe=UTF-8";
                                                               echo "<img src='".$google_chart_api_url."' alt='".$string."'>";
                                                               ?>
                                                               <!-- <img width="90" style="width: 100%; display: block; border: 0px;" src="<?php //echo $base_url_views;?>images/apb-qr-code.png"> -->
                                                            </td>
                                                            
                                                         </tr>
                                                         <!-- image end -->
                                                         
                                                      </tbody>
                                                   </table>
                                                   <!-- right column end -->
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                                 <!-- column x3 end -->
                                 
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
                  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
               </table>
            </td>
         </tr>
      </tbody>
   </table>

   <!-- ====== Module : Texts ====== -->
   <table align="center" class="full selected-table" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-2.png" data-module="Module-2" data-bgcolor="M2 Bgcolor 1">
      <tbody>
         <tr>
            <td>
               <table width="1000" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M2 Bgcolor 2">
                  <tbody>
                     <tr>
                        <td>
                           <table width="800" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">
                              <tbody>
                                 <tr>
                                    <td height="10" style="font-size:0px">&nbsp;</td>
                                 </tr>
                                 <!-- HEADING -->
                                 <tr>
                                    <td height="13" style="font-size:0px">&nbsp;</td>
                                 </tr>
                                 <!-- title -->
                                 <tr>
                                    <td class="res-center selected-element" style="text-align: center; color: #1b1b1b; font-family: 'Jost', sans-serif; font-size: 32px; letter-spacing: 0.7px; font-weight: bold;text-transform: uppercase; word-break: break-word" data-color="M2 Title 1" data-size="M2 Title 1" data-max="32" data-min="12" contenteditable="false">
									<?php echo $detail->course_name; ?>
                            <!-- (<?php //echo $detail->course_level; ?> LEVEL) -->
                                    </td>
                                 </tr>
                                 <!-- title end -->
                                 <!-- <tr>
                                    <td height="10" style="font-size:0px">&nbsp;</td>
                                 </tr> -->
                               
                                 <!-- HEADING end -->
                                 <tr>
                                    <td height="10" style="font-size:0px">&nbsp;</td>
                                 </tr>
                                 <!-- name -->
                                 <tr>
                                    <td class="res-center selected-element" style="text-align: center; color: #1b1b1b; font-family: 'Jost', sans-serif;text-transform: uppercase; font-size: 25px; letter-spacing: 0.7px; word-break: break-word; border-bottom: 1px solid #000; border-bottom: 1px solid #b7b7b7; line-height: 55px;" data-color="M2 Title 1" data-size="M2 Title 1" data-max="32" data-min="12" contenteditable="false">
									<?php echo $detail->caprefix; ?>. <?php echo $detail->candidate_name; ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="res-center" style="text-align: center; color: #202020; font-family: 'Jost', sans-serif; font-size: 18px;text-transform: uppercase; letter-spacing: 0.4px; line-height: 23px; word-break: break-word" data-color="M2 Paragraph 1" data-size="M2 Paragraph 1">
                                       Name and Last Name
                                    </td>
                                 </tr>
                                 <!-- name end -->
                                 
                                 <tr>
                                    <td height="15" style="font-size:0px">&nbsp;</td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
                  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
   <!-- ====== Module : Center Image ====== -->
   <table align="center" class="full" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-4.png" data-module="Module-4" data-bgcolor="M4 Bgcolor 1">
      <tbody>
         <tr>
            <td>
               <table width="750" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M4 Bgcolor 2">
                  <tbody>
                     <tr>
                        <td>
                           <table width="600" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">
                              <tbody>
                                
                                 <tr>
                                    <td height="0" style="font-size:0px">&nbsp;</td>
                                 </tr>
                                 <!-- column x2 -->
                                 <tr>
                                    <td>
                                       <table class="full" align="center" border="0" cellpadding="0" cellspacing="0">
                                          <tbody>
                                             <tr>
                                                <td valign="top">
                                                   <!-- left column -->
                                                   <table width="395" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                      <tbody>
                                                         <tr>
                                                            <td width="190">
                                                               <table class="full" align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 5px; line-height: 27px;">
                                                                  <!-- subtitle -->
                                                                  <tbody>
                                                                     <!-- name -->
                                 <tr>
                                    <td class="res-center selected-element" style="text-align: center; color: #1b1b1b;text-transform: uppercase; font-family: 'Jost', sans-serif; font-size: 18px; letter-spacing: 0.7px; word-break: break-word; border-bottom: 1px solid #000; border-bottom: 1px solid #b7b7b7; line-height: 40px; font-weight: 600;" data-color="M2 Title 1" data-size="M2 Title 1" data-max="32" data-min="12" contenteditable="false">
                                      <?php $strtotime1 =strtotime($detail->dob);
										echo date('d-F-Y',$strtotime1); ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="res-center" style="text-align: center; color: #202020; font-family: 'Jost', sans-serif;text-transform: uppercase; font-size: 17px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word" data-color="M2 Paragraph 1" data-size="M2 Paragraph 1" data-max="26" data-min="6">
                                       Date Of Birth
                                    </td>
                                 </tr>
                                 <!-- name end -->
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                            
                                                            <td width="190">
                                                               <table class="full" align="center" border="0" cellpadding="0" cellspacing="0">
                                                             
                                                                  <tbody>
                                                                       <!-- name -->
                                 <tr>
                                    <td class="res-center selected-element" style="text-align: center; text-transform: uppercase;color: #1b1b1b; font-family: 'Jost', sans-serif; font-size: 18px; letter-spacing: 0.7px; word-break: break-word; border-bottom: 1px solid #000; border-bottom: 1px solid #b7b7b7; line-height: 40px; font-weight: 600;" data-color="M2 Title 1" data-size="M2 Title 1" data-max="32" data-min="12" contenteditable="false">
									<?php echo $detail->nationality; ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="res-center" style="text-align: center; color: #202020;text-transform: uppercase; font-family: 'Jost', sans-serif; font-size: 17px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word" data-color="M2 Paragraph 1" data-size="M2 Paragraph 1" data-max="26" data-min="6">
                                    Nationality
                                    </td>
                                 </tr>
                                 <!-- name end -->
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                  
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                                 <!-- column x2 end -->
                                 <tr>
                                    <td height="20" style="font-size:0px">&nbsp;</td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
                  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
<!-- ====== Module : MOL header with logo and QR code ====== -->
<table align="center" class="full" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-7.png" data-module="Module-7" data-bgcolor="M7 Bgcolor 1">
   <tbody>
      <tr>
         <td>
            <table width="1050" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M7 Bgcolor 2">
               <tbody>
                  <tr>
                     <td>
                        <table width="1050" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">
                           <tbody>
                                                             
                              <!-- column x3 -->
                              <tr>
                                 <td>
                                    <table class="full" align="center" border="0" cellpadding="0" cellspacing="0">
                                       <tbody>
                                          <tr>
                                             <td valign="top">
                                                <!-- left column -->
                                                <table style="overflow: hidden; border-radius: 4px;" width="300" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                   <!-- image -->
                                                   <tbody>
                                                      <tr>
                                                         <td class="res-center" style="text-align: center; text-transform: uppercase;color: #202020; font-family: 'Jost', sans-serif; font-size: 15px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word" data-color="M2 Paragraph 1" data-size="M2 Paragraph 1" data-max="26" data-min="6">
                                                            Conducted from:
                                                         </td>
                                                         <td class="res-center selected-element" style="text-align: center; text-transform: uppercase;color: #1b1b1b; font-family: 'Jost', sans-serif; font-size: 15px; letter-spacing: 0.7px; word-break: break-word;font-weight: 600;" data-color="M2 Title 1" data-size="M2 Title 1" data-max="32" data-min="12" contenteditable="false">
														 <?php $strtotime2 =strtotime($detail->from_date);
														echo date('d-F-Y',$strtotime2); ?>
                                                         </td>
                                                      </tr>
                                                      <!-- image end -->
                                                     
                                                   </tbody>
                                                </table>
                                                <!-- left column end -->
                                                <!--[if (gte mso 9)|(IE)]>
                                             </td>
                                             <td>
                                                <![endif]-->
                                                <table width="15" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                   <tbody>
                                                      <tr>
                                                         <td height="20" style="font-size:0px">&nbsp;</td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                                <!--[if (gte mso 9)|(IE)]>
                                             </td>
                                             <td valign="top">
                                                <![endif]-->
                                                <!-- middle column -->
                                                <table style="overflow: hidden; border-radius: 4px;" width="200" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                   <!-- image -->
                                                   <tbody>
                                                      <tr>
                                                         <td class="res-center" style="text-align: center; text-transform: uppercase;color: #202020; font-family: 'Jost', sans-serif; font-size: 15px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word" data-color="M2 Paragraph 1" data-size="M2 Paragraph 1" data-max="26" data-min="6">
                                                            To:
                                                         </td>
                                                         <td class="res-center selected-element" style="text-align: center;text-transform: uppercase; color: #1b1b1b; font-family: 'Jost', sans-serif; font-size: 15px; letter-spacing: 0.7px; word-break: break-word;font-weight: 600;" data-color="M2 Title 1" data-size="M2 Title 1" data-max="32" data-min="12" contenteditable="false">
														 <?php $strtotime3 =strtotime($detail->to_date);
														echo date('d-F-Y',$strtotime3); ?>
                                                         </td>
                                                      </tr>
                                                      
                                                      
                                                   </tbody>
                                                </table>
                                                <!-- middle column end -->
                                                <!--[if (gte mso 9)|(IE)]>
                                             </td>
                                             <td>
                                                <![endif]-->
                                                <table width="15" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                   <tbody>
                                                      <tr>
                                                         <td height="20" style="font-size:0px">&nbsp;</td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                                <!--[if (gte mso 9)|(IE)]>
                                             </td>
                                             <td valign="top">
                                                <![endif]-->
                                                
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <!-- column x3 end -->
                              
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
               <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
            </table>
         </td>
      </tr>
   </tbody>
</table>
 <!-- ====== Module : Contact ====== -->
 <table align="center" class="full" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-19.png" data-module="Module-19" data-bgcolor="M19 Bgcolor 1">
   <tbody>
      <tr>
         <td>
            <table style="border-radius: 0 0 6px 6px;" width="750" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M19 Bgcolor 2">
               <tbody>
                  <tr>
                     <td>
                        <table width="600" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">
                           <tbody>
                              <tr>
                                 <td height="15" style="font-size:0px">&nbsp;</td>
                              </tr>
                              <!-- paragraph -->
                              <tr>
                                 <td class="res-center" style="text-align: center; text-transform: uppercase;color: #181818; font-family: 'Jost', sans-serif; font-size: 18px; letter-spacing: 0.4px; font-weight:600; line-height: 23px; word-break: break-word" data-color="M7 Paragraph 1" data-size="M7 Paragraph 1" data-max="26" data-min="6">
                                    Has sucessfully completed the following course.
                                 </td>
                              </tr>
                              <!-- paragraph end -->
                              <tr>
                                 <td height="10" style="font-size:0px">&nbsp;</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
               <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
            </table>
         </td>
      </tr>
   </tbody>
</table>
 <!-- ====== Module : Contact ====== -->
 <table align="center" class="full" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-19.png" data-module="Module-19" data-bgcolor="M19 Bgcolor 1">
   <tbody>
      <tr>
         <td>
            <table style="border-radius: 0 0 6px 6px;" width="750" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M19 Bgcolor 2">
               <tbody>
                  <tr>
                     <td>
                        <table width="800" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">
                           <tbody>
                              <tr>
                                 <td height="20" style="font-size:0px">&nbsp;</td>
                              </tr>
                              
                              <tr>
                                 <td>
                                    <table align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                       <tbody>
                                          <tr>
                                             
                                             <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0">
                                                   <!-- paragraph -->
                                                   <tbody>
                                                      <tr>
                                                         <td class="res-center" style="text-align: left;text-transform: uppercase; color: #383838; font-family: 'Jost', sans-serif; font-size: 19px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word; font-weight: 600;" data-color="M19 Paragraph 1" data-size="M19 Paragraph 1" data-max="26" data-min="6">
                                                            The training program consisted of detailed instructions on the following:
                                                         </td>
                                                      </tr>
                                                      <!-- paragraph end -->
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <!-- image end -->
                             
                              <!-- paragraph -->
                              <tr>
                                 <td class="res-center" style="text-align: left; color: #202020; text-transform: uppercase;font-family: 'Jost', sans-serif; font-size: 18px; letter-spacing: 0.4px; height: 550px;vertical-align: baseline;" data-color="M19 Paragraph 3" data-size="M19 Paragraph 3" data-max="26" data-min="6">
                                  <?php echo $detail->certi_description;?>
                                 </td>
                              </tr>
                              <!-- paragraph end -->
                              <tr>
                                 <td height="40" style="font-size:0px">&nbsp;</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
               <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- ====== Module : Footer ====== -->

<table align="center" class="full" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-20.png" data-module="Module-20" data-bgcolor="M20 Bgcolor 1">
   <tbody>
      <tr>
         <td>
            <table style="border-radius: 0 0 6px 6px;" width="950" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M20 Bgcolor 2">
               <tbody>
                  <tr>
                     <td>
                        <table width="900" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">
                           <tbody>
                              <!-- <tr>
                                 <td height="30" style="font-size:0px">&nbsp;</td>
                              </tr> -->
                              <!-- column x2 -->
                              <tr>
                                 <td>
                                    <table class="full" width="800" align="center" border="0" cellpadding="0" cellspacing="0">
                                       <tbody>
                                          <tr>
                                             <td valign="top">
                                                <!-- left column -->
                                                <table width="350" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                   <!-- title -->
                                                   <tbody>
                                                      
                                                      <!-- list -->
                                                      <tr>
                                                         <td>
                                                            <table align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                               <tbody>
                                                                  <tr>
                                                                     <td>
                                                                        <table align="center" style="border-radius: 0px;" border="0" cellpadding="0" cellspacing="0">
                                                                           <!-- list -->
                                                                           <tbody>
                                                                              <tr>
                                                                                 <!-- image -->
                                                                                 <td width="130">
                                                                                    <table align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                                                       <tbody>
                                                                                          <tr>
                                                                                             <td>
                                                                                                <table align="center" border="0" cellpadding="0" cellspacing="0">
                                                                                                   <tbody>
                                                                                                      <tr>
                                                                                                         <td style="text-align: left;text-transform: uppercase; color: #202020; font-family: 'Jost', sans-serif; font-size: 14px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word">
                                                                                                            Certificate No. :
                                                                                                         </td>
                                                                                                      </tr>
                                                                                                   </tbody>
                                                                                                </table>
                                                                                             </td>
                                                                                          </tr>
                                                                                       </tbody>
                                                                                    </table>
                                                                                 </td>
                                                                                 <!-- image end -->
                                                                                 <td>
                                                                                    <table class="full" align="center" border="0" cellpadding="0" cellspacing="0">
                                                                                       <!-- link -->
                                                                                       <tbody>
                                                                                          <tr>
                                                                                             <td class="res-left" style="text-align: center;
                                                                                             color: #1b1b1b;
                                                                                             font-family: 'Jost', sans-serif;text-transform: uppercase;
                                                                                             font-size: 14px;
                                                                                             letter-spacing: 0.7px;
                                                                                             word-break: break-word;
                                                                                             font-weight: 600;">
                                                                                               
																							   <?php echo $detail->certificate_no; ?>
                                                                                             
                                                                                             </td>
                                                                                          </tr>
                                                                                          <!-- link end -->
                                                                                       </tbody>
                                                                                    </table>
                                                                                 </td>
                                                                              </tr>
                                                                              <!-- list end -->
                                                                              
                                                                              <!-- list -->
                                                                              
                                                                              <!-- list end -->
                                                                           </tbody>
                                                                        </table>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                      <!-- list end -->
                                                   </tbody>
                                                </table>
                                                <!-- left column end -->
                                                <!--[if (gte mso 9)|(IE)]>
                                             </td>
                                             <td>
                                                <![endif]-->
                                                <table width="20" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                   <tbody>
                                                      <tr>
                                                         <td height="20" style="font-size:0px">&nbsp;</td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                                <!--[if (gte mso 9)|(IE)]>
                                             </td>
                                             <td valign="top">
                                                <![endif]-->
                                                <!-- right column -->
                                                <table width="350" align="right" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                   <!-- image -->
                                                   <tbody>
                                                      
                                                      <!-- paragraph -->
                                                      <tr>
                                                         <td class="res-center" style="text-align: right; color: #202020;text-transform: uppercase; font-family: 'Jost', sans-serif; font-size: 14px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word" data-color="M20 Paragraph 1" data-size="M20 Paragraph 1" data-max="26" data-min="6">
                                                            Course conducted : <strong><?php echo $detail->location; ?></strong>
                                                         </td>
                                                      </tr>
                                                      <!-- paragraph end -->
                                                      <tr>
                                                         <td height="4" style="font-size:0px">&nbsp;</td>
                                                      </tr>
                                                      <!-- link -->
                                                      <tr>
                                                         <td class="res-center" style="text-align: right; color: #202020; text-transform: uppercase;font-family: 'Jost', sans-serif; font-size: 14px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word">
                                                            
                                                            On <strong><?php $strtotime4 =strtotime($detail->issue_date);
														echo date('d-F-Y',$strtotime4); ?></strong>
                                                        
                                                         </td>
                                                      </tr>
                                                      <!-- link end -->
                                                   </tbody>
                                                </table>
                                                <!-- right column end -->
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <!-- column x2 end -->
                              <tr>
                                 <td height="50" style="font-size:0px">&nbsp;</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
               <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
            </table>
         </td>
      </tr>

   </tbody>
</table>

<!-- ====== Module : Footer ====== -->
<table align="center" class="full" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-20.png" data-module="Module-20" data-bgcolor="M20 Bgcolor 1">
   <tbody>
      <tr>
         <td>
            <table style="border-radius: 0 0 6px 6px;" width="950" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M20 Bgcolor 2">
               <tbody>
                  <tr>
                     <td>
                        <table width="900" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">
                           <tbody>
                             
                              <!-- column x2 -->
                              <tr>
                                 <td>
                                    <table class="full" width="800" align="center" border="0" cellpadding="0" cellspacing="0">
                                       <tbody>
                                          <tr>
                                             <td valign="top">
                                                <!-- left column -->
                                                <table width="290" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                   <!-- title -->
                                                   <tbody>
                                                      
                                                      <!-- list -->
                                                      <tr>
                                                         <td>
                                                            <table align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                               <tbody>
                                                                  <tr>
                                                                     <td>
                                                                        <table align="center" style="border-radius: 0px;" border="0" cellpadding="0" cellspacing="0">
                                                                           <!-- list -->
                                                                           <tbody>
                                                                              <tr>
                                                                                 <!-- image -->
                                                                                 <td>
                                                                                    <table align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                                                       <tbody>
                                                                                          <tr>
                                                                                             <td>
                                                                                                <table align="center" border="0" cellpadding="0" cellspacing="0">
                                                                                                   <tbody>
                                                                                                      <!-- name -->
                                 <tr>
                                    <td class="res-center selected-element" style="text-align: center;text-transform: uppercase; color: #1b1b1b; font-family: 'Jost', sans-serif; font-size: 18px; letter-spacing: 0.7px; word-break: break-word; border-bottom: 1px solid #000; border-bottom: 1px solid #b7b7b7; line-height: 40px; font-weight: 600;" data-color="M2 Title 1" data-size="M2 Title 1" data-max="32" data-min="12" contenteditable="false">
									<?php echo $detail->tprefix; ?>. <?php echo $detail->trainer_name; ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="res-center" style="text-align: center; color: #202020;text-transform: uppercase; font-family: 'Jost', sans-serif; font-size: 18px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word" data-color="M2 Paragraph 1" data-size="M2 Paragraph 1" data-max="26" data-min="6">
                                       (Course Faculty)
                                    </td>
                                 </tr>
                                 <!-- name end -->
                                                                                                   </tbody>
                                                                                                </table>
                                                                                             </td>
                                                                                          </tr>
                                                                                       </tbody>
                                                                                    </table>
                                                                                 </td>
                                                                                 <!-- image end -->
                                                                                 
                                                                              </tr>
                                                                              <!-- list end -->
                                                                              
                                                                              <!-- list -->
                                                                              
                                                                              <!-- list end -->
                                                                           </tbody>
                                                                        </table>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                      <!-- list end -->
                                                   </tbody>
                                                </table>
                                                <!-- left column end -->
                                                <!--[if (gte mso 9)|(IE)]>
                                             </td>
                                             <td>
                                                <![endif]-->
                                                <table width="40" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0" style="margin: 0; margin-left: 68px;">
                                                   <tbody>
                                                      <tr>
                                                      <?php if($detail->show_logo == 1){ ?>
                                                         <td ><img src="<?php echo $base_url_views;?>images/img0.jpg" ></td>
                                                      <?php } ?>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                                <!--[if (gte mso 9)|(IE)]>
                                             </td>
                                             <td valign="top">
                                                <![endif]-->
                                                <!-- right column -->
                                                <table width="290" align="right" class="res-full" border="0" cellpadding="0" cellspacing="0">
                                                   <!-- image -->
                                                   <tbody>
                                                      
                                                      <!-- paragraph -->
                                                      <!-- name -->
                                 <tr>
                                    <td class="res-center selected-element" style="text-align: center; color: #1b1b1b; font-family: 'Jost', sans-serif; font-size: 18px; letter-spacing: 0.7px; word-break: break-word; border-bottom: 1px solid #000; border-bottom: 1px solid #b7b7b7; line-height: 40px; font-weight: 600;" data-color="M2 Title 1" data-size="M2 Title 1" data-max="32" data-min="12" contenteditable="false">
                                      <!-- <img src="<?php //echo $base_url_views;?>images/cert3.jpg"> -->
                                      <?php if($detail->digital_signature != '') {?>
                                       <img src="<?php echo $front_base_url;?>upload/trainer/<?php echo $detail->digital_signature;?>">
                                       <?php } ?>
                                    </td>
                                 </tr>
                                
                                 <!-- name end -->
                                                      <!-- paragraph end -->
                                                     
                                                      
                                                   </tbody>
                                                </table>
                                                <!-- right column end -->
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <!-- column x2 end -->
                              <tr>
                                 <td height="50" style="font-size:0px">&nbsp;</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
               <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
            </table>
         </td>
      </tr>

   </tbody>
</table>
  <!-- ====== Module : Contact ====== -->
  <table align="center" class="full" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-19.png" data-module="Module-19" data-bgcolor="M19 Bgcolor 1">
   <tbody>
      <tr>
         <td>
            <table style="border-radius: 0 0 6px 6px;" width="750" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M19 Bgcolor 2">
               <tbody>
                  <tr>
                     <td>
                        <table width="600" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">
                           <tbody>
                              <!-- paragraph -->
                              <tr>
                                 <td class="res-center" style="text-align: center;text-transform: uppercase; color: #202020; font-family: 'Jost', sans-serif; font-size: 15px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word" data-color="M19 Paragraph 3" data-size="M19 Paragraph 3" data-max="26" data-min="6">
                                    The Quality management system of MOL Maritime (India) Pvt. Ltd. Has been certified to comply with ISO 9001:2015 standards by LRQA
                                 </td>
                              </tr>
                              <!-- paragraph end -->
                              <tr>
                                 <td height="20" style="font-size:0px">&nbsp;</td>
                              </tr>
                              <tr>
                                 <td class="res-center" style="text-align: center; text-transform: uppercase;color: #202020; font-family: 'Jost', sans-serif; font-size: 10px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word" data-color="M19 Paragraph 3" data-size="M19 Paragraph 3" data-max="26" data-min="6">
                                    *This is an Electronically generated certificate for Validity Verification Scan QR CODE on the certificate.
                                 </td>
                              </tr>
                              <!-- paragraph end -->
                              <tr>
                                 <td height="20" style="font-size:0px">&nbsp;</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
               <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
            </table>
         </td>
      </tr>
   </tbody>
</table>

</td>
</tr>
</tbody>

</table>

</div>

<!-- partial -->
  
</body>
</html>
