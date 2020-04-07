<?php
    session_start();
    include("../../config/connectdb.php");
    $branchid = $_SESSION['branchid'];

    $get_group = "SELECT count(gu.group_user_id) as totalStudents ,g.group_id as group_id, g.group_name as group_name, g.adviser_id as adviser_id, g.program_id as branch_id from groups g left join group_users gu on g.group_id = gu.group_id where g.program_id = '$branchid' group by g.group_name";

    $result = mysqli_query($con, $get_group);

    $output['data'][] = [];
	if(mysqli_num_rows($result) > 0){
        while($row = $result -> fetch_assoc())
        {
            $adviserId = $row['adviser_id'];
            if($adviserId != 0)
            {
                $sqlAdviserName = "SELECT firstname, lastname from users where users_id = '$adviserId'";
                $stmt = $conn->prepare($sqlAdviserName);
                $stmt->execute();
                foreach ($stmt  as $user)
                {
                    $Aname = $user['firstname']." ".$user['lastname'];
                }
            }
            else
            {
                $Aname = "No Adviser Yet";
            }
            

            $rows[0] = $row['group_name'];
            $rows[1] = $Aname;
            $rows[2] = $row['totalStudents'];

        $rows[3] =   "<button class='btn btn-xs btn-primary btn-table' id='btnEditGroup' group_id='".$row['group_id']."' groupname='".$row['group_name']."' data-toggle='modal' style='width: 65px;' >Edit Group</button>".
                    "<button class='btn btn-xs btn-danger btn-table' id='btnDeleteGroup' group_id='".$row['group_id']."' style='width: 65px;' >Delete</button>";
        if($row['branch_id'] == $branchid){
            $output['data'][] = $rows;
        }		
			
        }
        
        echo json_encode($output);
    }
    
    
?>