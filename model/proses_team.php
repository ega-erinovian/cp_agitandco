<?php
    include 'connect.php';
    date_default_timezone_get();

    // Enter your table Name;
    $tableName='team';

    $array_img = [];

    $query = mysqli_query($connect, "SELECT * FROM ".$tableName." WHERE id_team = '$_POST[id_team]'");
    while($data=mysqli_fetch_array($query)){
        $tmp_img_name = $data[5];
    }
    
    if(isset($_POST)){
        $id_team     = $_POST['id_team'];
        $nama           = $_POST['nama'];
        $deskripsi         = $_POST['deskripsi'];
        $ig      = $_POST['ig'];
        $devisi       = $_POST['devisi'];

        if(isset($_POST['delete_img'])){
            $delete_img = $_POST['delete_img'];
        }

        // Membuat folder baru untuk menyimpan gambar
        if(!file_exists("../assets/img/team/".$id_team)){
            mkdir("../assets/img/team/".$id_team);
        }

        
        if(isset($_FILES['img_file'])){
            $originalArray = explode(',', $tmp_img_name);

            // Loop melalui setiap file yang diunggah
            foreach($_FILES['img_file']['tmp_name'] as $key => $tmp_name) {
                $nama_file = $_FILES['img_file']['name'][$key];
                $tipe_file = $_FILES['img_file']['type'][$key];
                $ukuran_file = $_FILES['img_file']['size'][$key];

                if($nama_file != ""){
                    $data_file = file_get_contents($tmp_name);
                    if($_POST['kelola'] == 'edit'){
                        array_push($originalArray, $nama_file);
                    }else{
                        array_push($array_img, $nama_file);
                    }
                    
                    // Memindah file ke folder
                    $uploaded_path = '../assets/img/team/'.$id_team.'/'.$nama_file;
                    move_uploaded_file($tmp_name, $uploaded_path);
                }
            }

            if($_POST['kelola'] == 'edit'){
                $string_img = implode(",", $originalArray);
            }else{
                $string_img = implode(",", $array_img);
            }
            
        }else{
            $string_img = "";
        }
    }

    switch($_POST['kelola']){
        case 'tambah':
            $query = "INSERT INTO ".$tableName." VALUE('$id_team', '$nama', '$deskripsi', '$ig', '$devisi', '$string_img')";
            if(mysqli_query($connect, $query)){
                // send message to table log_activities
                echo "Data Added Successfully";
            }else{
                unlink($uploaded_path);
                echo "Failed Adding Data: ".mysqli_error($connect);
            }
            header('Location: ../projects/team.php');
            break;
        case 'edit':
            // Hapus gambar yang dicentang di kelola_project
            if(isset($delete_img)){
                $originalArray = explode(',', $tmp_img_name);
                // foreach($delete_img as $img){
                    $path = realpath('../assets/img/team/'.$id_team.'/'.$tmp_img_name);
                    unlink($path);

                    // Menghapus nilai pada array
                    // foreach ($originalArray as $key => $value) {
                    //     if ($value == $img) {
                    //         unset($originalArray[$key]);
                    //     }
                    // }
                // }
                $originalArray=[];
                $string_img ='';
            }

            if(isset($delete_img)){
                $query = "UPDATE ".$tableName." SET `id_team`='$id_team', `nama`='$nama', `deskripsi`='$deskripsi', `ig`='$ig', `devisi`='$devisi', `img`='$string_img' WHERE `id_team` = '$id_team'";
            }else{
                $query = "UPDATE ".$tableName." SET `id_team`='$id_team', `nama`='$nama', `deskripsi`='$deskripsi', `ig`='$ig', `devisi`='$devisi' WHERE `id_team` = '$id_team'";
            }
            
            if(mysqli_query($connect, $query)){
                // send message to table log_activities
                echo "Data Edited Successfully";
            }else{
                echo mysqli_error($connect);
                // header('Location: ../projects/team.php?gagalanying');
            }
            header('Location: ../projects/team.php');
            break;

        case 'hapus':
            $query = "DELETE FROM ".$tableName." WHERE `id_team` = '$_POST[id_team]'";
            $path = realpath('../assets/img/team/'.$id_team);

            if(mysqli_query($connect, $query)){
                // Hapus folder gambar
                array_map('unlink', glob("$path/*.*"));
                rmdir($path);

                // send message to table log_activities
                echo "Data Deleted Successfully";
            }
            header('Location: ../projects/team.php');
            break;
    }


