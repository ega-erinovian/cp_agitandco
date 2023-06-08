<?php
    include 'connect.php';
    date_default_timezone_get();

    // Enter your table Name;
    $tableName='background';

    $array_img = [];

    $query = mysqli_query($connect, "SELECT * FROM ".$tableName." WHERE id_gambar = '$_POST[id_gambar]'");
    while($data=mysqli_fetch_array($query)){
        $tmp_img_name = $data[2];
    }
    
    if(isset($_POST)){
        $id_gambar     = $_POST['id_gambar'];
        $tempatgambar       = $_POST['tempatgambar'];
        
        
        if(isset($_POST['delete_img'])){
            $delete_img = $_POST['delete_img'];
        }

        // Membuat folder baru untuk menyimpan gambar
        if(!file_exists("../assets/img/page/".$id_gambar)){
            mkdir("../assets/img/page/".$id_gambar);
        }

        
        if(isset($_FILES['img_file'])){
            $originalArray = explode(',', $tmp_img_name);
            if($tmp_img_name==''){
                $originalArray=[];
            }
            // Loop melalui setiap file yang diunggah
            foreach($_FILES['img_file']['tmp_name'] as $key => $tmp_name) {
                $tempatgambar_file  = $_FILES['img_file']['name'][$key];
                $tipe_file      = $_FILES['img_file']['type'][$key];
                $ukuran_file    = $_FILES['img_file']['size'][$key];

                if($tempatgambar_file != ""){
                    $data_file = file_get_contents($tmp_name);
                    if($_POST['kelola'] == 'edit'){
                        array_push($originalArray, $tempatgambar_file);
                    }else{
                        array_push($array_img, $tempatgambar_file);
                    }
                    
                    // Memindah file ke folder
                    $uploaded_path = '../assets/img/page/'.$id_gambar.'/'.$tempatgambar_file;
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
            $query = "INSERT INTO ".$tableName." VALUE('$id_gambar', '$tempatgambar', '$string_img')";
            if(mysqli_query($connect, $query)){
                // send message to table log_activities
                echo "Data Added Successfully";
                header('Location: ../gambar/viewgambar.php?berhasil');
            }else{
                
                unlink($uploaded_path);
                echo "Failed Adding Data: ".mysqli_error($connect);
                header('Location: ../gambar/viewgambar.php?'.mysqli_error($connect).'');
            }
            break;
        case 'edit':
            // Hapus gambar yang dicentang di kelola_project
            // if(isset($delete_img)){
            //     $originalArray = explode(',', $tmp_img_name);
            //     foreach($delete_img as $img){
            //         $path = realpath('../assets/img/page/'.$id_gambar.'/'.$img);
            //         unlink($path);

            //         // Menghapus nilai pada array
            //         foreach ($originalArray as $key => $value) {
            //             if ($value == $img) {
            //                 unset($originalArray[$key]);
            //             }
            //         }
            //     }

            //     $string_img = implode(",", $originalArray);
            // }

            if(empty($string_img) == 0){
                // $query = "UPDATE ".$tableName." SET `id_gambar`='$id_gambar', `tempatgambar`='$tempatgambar', `img`='$string_img' WHERE `id_gambar` = '$id_gambar'";
                $query = "UPDATE " . $tableName . " SET ";
                $setClauses = [];

                if (!empty($id_gambar)) {
                    $setClauses[] = "`id_gambar` = '$id_gambar'";
                }

                if (!empty($tempatgambar)) {
                    $setClauses[] = "`tempatgambar` = '$tempatgambar'";
                }

                // if (!empty($judul)) {
                //     $setClauses[] = "`judul` = '$judul'";
                // }

                // if (!empty($deskripsi)) {
                //     $setClauses[] = "`deskripsi` = '$deskripsi'";
                // }

                // if (!empty($tanggal)) {
                //     $setClauses[] = "`tanggal` = '$tanggal'";
                // }

                if (isset($delete_img)) {
                    $originalArray = explode(',', $tmp_img_name);
                    foreach ($delete_img as $img) {
                        $path = realpath('../assets/img/page/' . $id_gambar . '/' . $img);
                        unlink($path);
                
                        // Menghapus nilai pada array
                        foreach ($originalArray as $key => $value) {
                            if ($value == $img) {
                                unset($originalArray[$key]);
                            }

                        }

                    }
                
                    if (count($originalArray) > 1) {
                        $setClauses[0] .= ", `img` = '" . implode(",", $originalArray) . "'";
                    } elseif (count($originalArray) == 1) {
                        $setClauses[0] .= ", `img` = '" . reset($originalArray) . "'";
                    } else {
                        $setClauses[0] .= ", `img` = NULL";
                    }
                }
                else{
                    $setClauses[]="img='$string_img'";
                }

                $query .= implode(", ", $setClauses);
                $query .= " WHERE `id_gambar` = '$id_gambar'";
            }else{
                $query = "UPDATE ".$tableName." SET `id_gambar`='$id_gambar', `tempatgambar`='$tempatgambar' WHERE `id_gambar` = '$id_gambar'";
            }
            
            if(mysqli_query($connect, $query)){
                // send message to table log_activities
                echo "Data Edited Successfully";
            }else{
                echo mysqli_error($connect);
            }
            header('Location: ../gambar/viewgambar.php');
            break;

        case 'hapus':
            $query = "DELETE FROM ".$tableName." WHERE `id_gambar` = '$_POST[id_gambar]'";
            $path = realpath('../assets/img/page/'.$id_gambar);

            if(mysqli_query($connect, $query)){
                // Hapus folder gambar
                array_map('unlink', glob("$path/*.*"));
                rmdir($path);

                // send message to table log_activities
                echo "Data Deleted Successfully";
            }
            header('Location: ../gambar/viewgambar.php');
            break;
    }


