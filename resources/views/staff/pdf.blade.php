
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="invoice.css"></head>
<style>
    /* Define styles for the PDF content */
    body {
        font-family: Arial, sans-serif;
    }
    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #59209f;
        padding: 8px;
    }
</style>
<style>
    body {
       background-color: #56702b;
       color: #fff;
       font-family: Arial, sans-serif;
       text-align: center;
    }
    
    .logo {
       font-size: 5em;
       font-weight: bold;
       text-transform: uppercase;
       margin: 20px auto;
       width: 200px;
       height: 200px;
       background-color: #fff;
       border-radius: 50%;
       box-shadow: 0 0 10px #0f0;
    }
    
    .logo-text {
       font-size: 2em;
       color: #000;
    }
    
    .course-section {
       margin: 50px auto;
       width: 80%;
       height: 300px;
       background-color: #fff;
       border-radius: 5px;
       box-shadow: 0 0 10px #0f0;
    }
    
    .course {
       width: 20%;
       height: 100px;
       background-color: #0f0;
       margin: 10px;
       display: inline-block;
    }
    
    .footer {
       margin-top: 50px;
       width: 100%;
       height: 50px;
       background-color: #407e76;
       border-radius: 5px;
       box-shadow: 0 0 10px #0f0;
    }
    </style>
    @foreach($allocations as $allocation)
<body style="padding: 3rem">
    <div class="logo">
        <div class="logo-text">KSG</div>
        
    </div>
    
    
    <h1 style="padding: 20px; text-align: center; font-weight: bold;">KENYA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     SCHOOL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  OF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    GOVENMENT </h1>
    <h3 style="padding: 20px; text-align: center;">ICT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     DEVICE&nbsp;&nbsp;&nbsp;&nbsp;  REQUEST&nbsp;&nbsp;&nbsp;&nbsp;  FORM</h3>
    <h3>Issued To:&nbsp;</h3><br>
    <h3 >Full Name:&nbsp;{{ Auth::guard('staff')->user()->fname }}&nbsp;&nbsp;{{ Auth::guard('staff')->user()->mname}}&nbsp;&nbsp;{{ Auth::guard('staff')->user()->sname }}</h3></br >
   
    <h3>Email Adress:&nbsp;{{ Auth::guard('staff')->user()->email }}</h3><br>
    <h3>Phone Number:&nbsp;{{ Auth::guard('staff')->user()->phone }}</h3><br>
    <h3>ID & Passport:&nbsp;{{ Auth::guard('staff')->user()->iden }}</h3>

   
    <h3>Department :&nbsp;{{ Auth::guard('staff')->user()->dept}}<h3><br>

    <h4 style="color: rgb(254, 95, 9)">In accepting  the use of  the above ICT   equipment,I agree to  the following  conditions</h4><br>
    <p>
    <h4>1.I understand  that I am solely responsible for the equipment  while it  is in my possession</h4>
    <h4>2.I shallonly  use the equipment for Schoolreleted purposes</h4>
    <h4>3.I shall keep the equpment  in good working order  and will notify  the ICT section   of any defects or malfunction  during  my  use</h4>
    <h4>4.I shall not allow the equipment  to  be used  by  an unknown or  unauthorized person .I assume the responsibility  for the actins of others while  using  the equipment</h4>
    <h4>5.In case of loss,damage or  theft,I shall report  the incident  to  the ICT Office within 24houre.If the loss ,damage or theft  is determined  to  be caused  by  negligence or intentionak misuse,I shall assume  the full financial responsibility  for  the repair costs or  replacement  at  fair market value  of  the equipment.</h4>
    <h4>6.I shall not insatall and/or  download any unauthorized software  and/or application.</h4>
    <h4>7.I understand  that once my engagement  with the School ends,iit's my  responsibility  to return all equipment</h4>
    <h4> Sign&nbsp;..........................................................................................</h3>
    <h4>Date&nbsp;..........................................................................................</h3>
    </p>
    <div style="margin-top: 3rem">
        Request No: #{{ Auth::guard('staff')->user()->iden }}<br />
        Email: #{{ Auth::guard('staff')->user()->email }}
    </div><br><br><br><br>
    <br><br>
    <dr><nl>
    <h1 style="font-size: 25px">Device info:</h1>
    
    <table class="table">
        
            <tr>
                <th>Alloacation status</th>
                <td>{{ $allocation->status }}</td>
            </tr>
            <tr>
                <th>Device SerialNumber</th>
                <td>{{ $allocation->sno }}</td>
            <tr>
                <th>Device Name</th>
                <td>{{ $allocation->type}}</td>
            </tr>
            <tr>
                <th>Device Tag Number:</th>
                <td>{{ $allocation->devtag }}}</td>
            </tr>
            <tr>
                <th>Device Model</th>
                <td>{{ $allocation->devmodel }}</td>
            </tr>
            <tr>
                <th>Allocation Date</th>
                <td>{{ $allocation->ADate}}</td>
            </tr>
            <tr>
                <th>Return Date</th>
                <td>{{ $allocation->ERD}}</td>
            </tr>
            <tr>
                <th>Event Name</th>
                <td>{{ $allocation->event}}</td>
            </tr>
            <tr>
                <th>Fine</th>
                <td>.........{{ $allocation->fine}}.00</td>
            </tr>
           
           
          
       
    </table>
 
    <h4> Recived  By&nbsp;..........................................................................................</h3>
        <h4>Date&nbsp;..........................................Condition................................................</h3>
    <h2>Secret key:KSG&nbsp; {{ Auth::guard('staff')->user()->iden}}&nbsp;{{ Auth::guard('staff')->user()->fname }}&nbsp;{{ Auth::guard('staff')->user()->id }}</h2>

    <h3></h3>

</body>
@endforeach
</html>