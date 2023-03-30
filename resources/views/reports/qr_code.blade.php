<!DOCTYPE html>
<html>
<body>
  
    
    <button onclick="window.print()">Print</button>

    
    <p>
        {{QrCode::generate($find->supply_code)}}
    </p>

    <p>{{$find->supply_code}}</p>
    <p>{{$find->description}}</p>
</body>
</html>


