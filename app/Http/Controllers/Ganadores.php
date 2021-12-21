<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Ganadores extends Controller
{
    
    public function GenerarPDF()
    {
        $ganador=['nombre'=>'Marcos','apellido'=>'Caballero','dni'=>35849098,"email"=>"madcmix14sj@gmail.com"];
       
        $options= new Options();
        $options->set('isRemoteEnabled',true);
      
        //$html=file_get_contents('http://localhost:8000/resources/views/certificadoPDF.blade.php');
        $dompdf = new Dompdf($options);
        view()->share('certificadoPDF',['ganador'=>$ganador]);
        $dompdf->loadhtml(view('certificadoPDF',['ganador'=>$ganador]));
        //$dompdf->loadHtml('$html');
        $dompdf->setPaper('A4', 'landscape');
        
        //$options = new Options();
        //$options->set('isRemoteEnabled',true);      
        //$dompdf = new Dompdf( $options );

        
        $dompdf->render();
        $dompdf->stream('certificado.pdf',array('Attachment'=>false));
        return view('certificadoPDF',['ganador'=>$ganador]);
       

    }

    public function enviarMail()
    {
        $mail = new PHPMailer(true);

        
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'concursoescolar2021@ossesanjuan.com.ar';                     //SMTP username
        $mail->Password   = 'NknJA2qA';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom("concursoescolar2021@ossesanjuan.com.ar", "CONCURSO ESCOLAR 2021 - OSSE SAN JUAN");
       // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    }

}
