<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css\sellstyle.css">
    <title>البيع</title>
    <style>
        .logo1 {
            position: fixed;
            height: 10vh;
            width: 100%;
            top: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            background-color: white;
            padding: 17px 6%;
            transition: all .50s ease;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
        .logo1 a{
            text-decoration:none;
        }
        .logo1 h3{
            display: inline-block;
            color: #0496ff;;
        }
    </style>
</head>
<body> 
<header class="logo1">
        <a href="home.php">&#8594;<h3>الدواء للجميع</h3></a>
    </header>
    <div class="cont">
        <div class="header">
            <h5>اختر الفئه</h5>
        </div>
        
        <select class='form-control txt padd' onchange='window.location.href=this.value' name='option'>
            <option>اختر ادوية</option>
            <option value="sell.php?p_type=cardiac">أدوية القلب</option>
            <option value="sell.php?p_type=orthopedic">أدوية عظام</option>
            <option value="sell.php?p_type=antihypertensive">أدوية ضغط</option>
            <option value="sell.php?p_type=antidiabetic">أدوية سكرى </option>
            <option value="sell.php?p_type=cold">أدوية نزلات برد</option>
            <option value="sell.php?p_type=asthma">أدوية حساسيه صدر</option>
            <option value="sell.php?p_type=sinus allergies">أدوية حساسية جيوب أنفيه</option>
            <option value="sell.php?p_type=vitamins">فيتامينات</option>
            <option value="sell.php?p_type=neurological"> أدوية أعصاب</option>
            <option value="sell.php?p_type=antidepressant">أدوية إكتئاب</option>
            <option value="sell.php?p_type=other"> أدوية أخرى</option>
        </select>
        <hr>
        
        
        <select class="form-control txt padd" onchange="window.location.href=this.value">
            <option>معدات طبية</option>
            <option value="sell.php?p_type=MedicalEquipment"> اجهزة الطبية</option>
            <option value="sell.php?p_type=MedicalSupply"> المستلزمات الطبية</option>
        </select>
        <hr>

        

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"crossorigin="anonymous"></script>
</body>
</html>