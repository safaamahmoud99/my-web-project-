<?php
$conn=new mysqli("localhost","root","rootroot","asd");
if($conn->connect_error)
die($conn->connect_error);

if(isset($_POST['load'])){
    $LoadObject=json_decode($_POST['load'],true);
    echo json_encode($LoadObject);
    for($i=0;$i<count($LoadObject);$i++)
    {
        $targetss=$LoadObject[$i]["targets"];
        $typess=$LoadObject[$i]["types"];
        $datess =$LoadObject[$i]["dates"];
        $sql="Insert Into Sobject Values('$targetss','$typess',' $datess')";
        $conn->query($sql);
        if($conn->affected_rows >0)
        {
        echo "row of load inserted sucessfully";
        }
        else 
        {
        echo "sorry safaa there is problem with insert row of load";
        }
       
    }
}
if(isset($_POST['unload'])){
    $UnLoadObject=json_decode($_POST['unload'],true);
    echo json_encode($UnLoadObject);
	for($i=0;$i<count($UnLoadObject);$i++)
    {
        $targetss=$UnLoadObject[$i]["targets"];
        $typess=$UnLoadObject[$i]["types"];
        $datess=$UnLoadObject[$i]["dates"];
        $sql="Insert Into Sobject Values('$targetss','$typess','$datess')";
        $conn->query($sql);
        if($conn->affected_rows >0)
        {
        echo "row of unloads inserted sucessfully";
        }
        else 
        {
        echo "sorry safaa there is problem with insert row of unload";
        }
}
}
if(isset($_POST['generate'])){
    $Gobject=json_decode($_POST['generate'],true);
    echo json_encode($Gobject);
	for($i=0;$i<count($Gobject);$i++)
    {
        $targetss=$Gobject[$i]["targets"];
        $typess=$Gobject[$i]["types"];
        $datess=$Gobject[$i]["dates"];
        $sql="Insert Into Sobject Values('$targetss','$typess','$datess')";
        $conn->query($sql);
        if($conn->affected_rows >0)
        {
        echo "row of generate letters inserted sucessfully";
        }
        else 
        {
        echo "sorry safaa there is problem with insert row of generate letters";
        }
}
}
if(isset($_POST['letters'])){
    $leobject=json_decode($_POST['letters'],true);
   // echo json_encode($leobject);
	for($i=0;$i<count($leobject);$i++)
    {
        $targetss=$leobject[$i]["targets"];
        $typess=$leobject[$i]["types"];
        $datess=$leobject[$i]["dates"];
        $sql="Insert Into Sobject Values('$targetss','$typess','$datess')";
        $conn->query($sql);
        if($conn->affected_rows >0)
        {
        echo "row of letters inserted sucessfully";

        }
        else 
        {
        echo "sorry safaa there is problem with insert row of letters";
        }
}
}
if (isset($_GET['Sobject']))
{
$sql="Select * from Sobject";

if($res = $conn->query($sql))
{
    $rows=array();
    if($res->num_rows > 0)
    {
        while($row=$res->fetch_assoc())
        {
            array_push($rows,$row);

        }
        echo json_encode($rows);
    }
     
}
else
{
    echo "sorry no data to retrieve";
}
}

?>