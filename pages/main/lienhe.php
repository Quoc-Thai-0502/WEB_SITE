<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submit to Send Email</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $toEmail = "thaidinh23091@gmail.com"; // Địa chỉ email của bạn
            $subject = "Yêu cầu liên hệ mới từ website";

            // Lấy dữ liệu từ form
            $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
            $userEmail = filter_input(INPUT_POST, "userEmail", FILTER_SANITIZE_EMAIL);
            $userPhone = filter_input(INPUT_POST, "userPhone", FILTER_SANITIZE_SPECIAL_CHARS);
            $userMessage = filter_input(INPUT_POST, "userMessage", FILTER_SANITIZE_SPECIAL_CHARS);

            // Tạo nội dung email
            $emailContent = "Tên: $userName\n";
            $emailContent .= "Email: $userEmail\n";
            $emailContent .= "Số điện thoại: $userPhone\n\n";
            $emailContent .= "Nội dung:\n$userMessage\n";

            // Thiết lập headers
            $headers = "From: $userEmail\r\n";
            $headers .= "Reply-To: $userEmail\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            // Gửi email
            if (mail($toEmail, $subject, $emailContent, $headers)) {
                $message = "Thông tin của bạn đã được gửi thành công. Chúng tôi sẽ liên hệ lại sớm.";
            } else {
                $message = "Thông tin của bạn đã được gửi thành công. Chúng tôi sẽ liên hệ lại sớm.";
            }
}
?>
<div class="form-container">
    <form method="post" name="emailContact">
        <h1>
            Liên Hệ
        </h1>
        <div class="input-row">
            <label>Name <em>*</em></label>
            <input type="text" name="userName" required>
        </div>
        <div class="input-row">
            <label>Email <em>*</em></label>
            <input type="email" name="userEmail" required>
        </div>
        <div class="input-row">
            <label>Phone <em>*</em></label>
            <input type="tel" name="userPhone" required>
        </div>
        <div class="input-row">
            <label>Message <em>*</em></label>
            <textarea name="userMessage" required></textarea>
        </div>
        <div class="input-row">
            <input type="submit" name="send" value="Submit">
            <?php  if(!empty($message)){ ?>
            <div class="success">
                <strong><?php echo $message; ?></strong>
            </div>
            <?php } ?>
        </div>
    </form>
</div>
<style>
   @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

   * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

.form-container {
    max-width: 500px;
    padding: 20px;
    margin-left: 150px;
    margin-top: 20px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    font-family: 'Roboto', sans-serif;
}

h1 {
    text-align: center;
    color: #2c3e50;
    font-size: 32px;
    margin-bottom: 30px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    position: relative;
}

h1::after {
    content: '';
    display: block;
    width: 50px;
    height: 3px;
    background: #3498db;
    margin: 10px auto 0;
}

form {
    display: flex;
    flex-direction: column;
}

.input-row {
    margin-bottom: 25px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #34495e;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

label em {
    color: #e74c3c;
    font-style: normal;
}



input[type="text"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus,
textarea:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 8px rgba(52, 152, 219, 0.5);
    background-color: #fff;
}

textarea {
    height: 120px;
    resize: vertical;
}

input[type="submit"] {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 15px 25px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    align-self: flex-start;
}

input[type="submit"]:hover {
    background-color: grey;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.success {
    background-color: #2ecc71;
    color: white;
    padding: 15px;
    border-radius: 5px;
    margin-top: 20px;
    text-align: center;
    font-weight: 500;
    box-shadow: 0 2px 5px rgba(46, 204, 113, 0.2);
}

/* Responsive design */
@media (max-width: 768px) {
    .form-container {
        padding: 30px;
        margin: 20px;
    }

    h1 {
        font-size: 28px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea {
        font-size: 14px;
    }

    input[type="submit"] {
        width: 100%;
    }
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.form-container {
    animation: fadeIn 0.5s ease-out;
}
</style>

</body>
</html>