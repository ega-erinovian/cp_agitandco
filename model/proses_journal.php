<?php
    include 'connect.php';
    date_default_timezone_get();

    // Enter your table Name;
    $tableName='journal';

    $array_img = [];

    $query = mysqli_query($connect, "SELECT * FROM ".$tableName." WHERE id_journal = '$_POST[id_journal]'");
    while($data=mysqli_fetch_array($query)){
        $tmp_img_name = $data[5];
    }
    
    if(isset($_POST)){
        $id_journal     = $_POST['id_journal'];
        $kategori       = $_POST['kategori'];
        $judul          =  $_POST['judul'];
        $deskripsi      = $_POST['deskripsi'];
        $tanggal        = $_POST['tanggal'];
        
        if(isset($_POST['delete_img'])){
            $delete_img = $_POST['delete_img'];
        }

        // Membuat folder baru untuk menyimpan gambar
        if(!file_exists("../assets/img/journal/".$id_journal)){
            mkdir("../assets/img/journal/".$id_journal);
        }

        
        if(isset($_FILES['img_file'])){
            $originalArray = explode(',', $tmp_img_name);

            // Loop melalui setiap file yang diunggah
            foreach($_FILES['img_file']['tmp_name'] as $key => $tmp_name) {
                $kategori_file  = $_FILES['img_file']['name'][$key];
                $tipe_file      = $_FILES['img_file']['type'][$key];
                $ukuran_file    = $_FILES['img_file']['size'][$key];

                if($kategori_file != ""){
                    $data_file = file_get_contents($tmp_name);
                    if($_POST['kelola'] == 'edit'){
                        array_push($originalArray, $kategori_file);
                    }else{
                        array_push($array_img, $kategori_file);
                    }
                    
                    // Memindah file ke folder
                    $uploaded_path = '../assets/img/journal/'.$id_journal.'/'.$kategori_file;
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
            $query = "INSERT INTO ".$tableName." VALUE('$id_journal', '$kategori', '$judul', '$deskripsi', '$tanggal', '$string_img')";
            if(mysqli_query($connect, $query)){
                // send message to table log_activities
                echo "Data Added Successfully";
                header('Location: ../journal/viewjournal.php?berhasil');
            }else{
                
                unlink($uploaded_path);
                echo "Failed Adding Data: ".mysqli_error($connect);
                header('Location: ../journal/viewjournal.php?'.mysqli_error($connect).'');
            }
            break;
        case 'edit':
            // Hapus gambar yang dicentang di kelola_project
            if(isset($delete_img)){
                $originalArray = explode(',', $tmp_img_name);
                foreach($delete_img as $img){
                    $path = realpath('../assets/img/journal/'.$id_journal.'/'.$img);
                    unlink($path);

                    // Menghapus nilai pada array
                    foreach ($originalArray as $key => $value) {
                        if ($value == $img) {
                            unset($originalArray[$key]);
                        }
                    }
                }

                $string_img = implode(",", $originalArray);
            }

            if(empty($string_img) == 0){
                $query = "UPDATE ".$tableName." SET `id_journal`='$id_journal', `kategori`='$kategori', `judul`='$judul', `deskripsi`='$deskripsi', `tanggal`='$tanggal', `img`='$string_img' WHERE `id_journal` = '$id_journal'";
            }else{
                $query = "UPDATE ".$tableName." SET `id_journal`='$id_journal', `kategori`='$kategori', `judul`='$judul', `deskripsi`='$deskripsi', `tanggal`='$tanggal' WHERE `id_journal` = '$id_journal'";
            }
            
            if(mysqli_query($connect, $query)){
                // send message to table log_activities
                echo "Data Edited Successfully";
            }else{
                echo mysqli_error($connect);
            }
            header('Location: ../journal/viewjournal.php');
            break;

        case 'hapus':
            $query = "DELETE FROM ".$tableName." WHERE `id_journal` = '$_POST[id_journal]'";
            $path = realpath('../assets/img/journal/'.$id_journal);

            if(mysqli_query($connect, $query)){
                // Hapus folder gambar
                array_map('unlink', glob("$path/*.*"));
                rmdir($path);

                // send message to table log_activities
                echo "Data Deleted Successfully";
            }
            header('Location: ../journal/viewjournal.php');
            break;
    }


