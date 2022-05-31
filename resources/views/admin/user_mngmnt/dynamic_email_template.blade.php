@if($data['supplier_accessibility'] == "activated")
    <span style="color:green;font-size:20px">Granting permission to use the Supplier account.</span>
    <br>

    <p>Hi, {{ $data['name'] }}, We are glad to inform you that the name which has
    {{ $data['supplied_by'] }} is granted the supplier privilleges by the administrator.
    Now you can login to our System and use its features according to your neccesity. <br>

    Your email : {{ $data['email'] }}<br>
    Your name : {{ $data['name'] }}<br>


    Thank you.<br>
    Yours sincirely,<br>
    BRIGHT AQUA Importers and Distributors,<br>
    Owner's name<br>
    Owner

    </p>

    @else
        <p>
            Sorry. we are unable to grant the permission for this account.
        </p>
    @endif