<?php
session_start();
class Connection{
public $host="localhost";
public $user ="root";
public $password="";
public $db_name="buku";
public $conn;
public function __construct(){$this->conn = mysqli_connect($this->host, $this->user, $this->password,$this->db_name);
if($this->conn==false)die("tidak dapat tersambung ke database".$this->$conn->connect_error());
return $this->conn;
}
}

//class register
class Register extends Connection{
    public function registration($id, $nama, $username, $password, $cpass,$level){
    $duplicate=mysqli_query($this->conn, "SELECT * FROM user WHERE id ='$id'");
    if(mysqli_num_rows($duplicate)>0){
    return 10;
    //nik has already taken
    }
    else{
    if($password==$cpass){
    $query ="INSERT INTO user (id, nama, username, password,level) VALUES ('$id', '$nama', '$username', md5('$password'), '$level')";
    mysqli_query($this->conn, $query);
    return 1;
    //register successful
    }
    else{
    return 100;
    //password does not match
    }
    }
    }
    } 

    class Login extends Connection{
        public $id;
        public $level;
        
        public function loginan($username, $password, $level){
            $result = mysqli_query($this->conn, "SELECT * FROM user WHERE username ='$username' and password='$password' and level='$level'");
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result)>0){
                if($password==$row["password"]){
                    $this->id=$row["id"];
                    $this->level=$row["level"];
                    return 1;
        // login success
        }
        else{
        return 10;
        //wrong password
            }
        }
        else{
        return 100;
        //user not registered
            }
        }
        
        public function idUser(){
        return $this->id;
            }
        
        public function getLevel(){
        return $this->level;
            }
        
        }

//tambah kategori

class Tambah extends Connection{
    public function registration($id, $nama_kategori){
    $duplicate=mysqli_query($this->conn, "SELECT * FROM kategori WHERE id ='$id'");
    if(mysqli_num_rows($duplicate)>0){
    return 10;
    //nik has already taken
    }
    else{
    if($nama_kategori){
    $query ="INSERT INTO kategori (id, nama_kategori) VALUES ('$id', '$nama_kategori')";
    mysqli_query($this->conn, $query);
    return 1;
    //register successful
    }
    else{
    return 100;
    //password does not match
    }
    }
    }
    }

//class Kategori
class CrudKategori extends Connection{
    public function prepare($data){
    $perintah = $this->conn->prepare($data);
    if(!$perintah)die("Terjadi kesalahan pada prepare statement".$this->conn->error);
    return $perintah;
    }
    public function query($data){
    $perintah = $this->conn->query($data);
    if(!$perintah)die("Terjadi kesalahan pada query statement".$this->conn->error);
    return $perintah;
    }
    public function insertPetugas($id, $nama){
    $query ="INSERT INTO kategori (id, nama_kategori) values ('$id','$kategori')";
    mysqli_query($this->conn, $query);
    return 1; 
    }
    public function tampilKategori(){
    $sql="SELECT id, nama_kategori FROM kategori";
    $perintah=$this->query($sql);
    return $perintah;
    }
    public function detailDataKategori($data){
    $sql="SELECT id, nama_kategori FROM kategori WHERE id=?";
    if($stmt=$this->conn->prepare($sql)):
    $stmt->bind_param("i",$param_data);
    $param_data=$data;
    if($stmt->execute()):
    $stmt->store_result();
    $stmt->bind_result($this->id, $this->nama_kategori);
    $stmt->fetch();
    if($stmt->num_rows==1):
    return true;
    else: 
    return false;
    endif;
    endif;
    endif; 
    $stmt->close();
    }
    public function updateKategori( $kategori, $data){
    $query ="update kategori set nama_kategori='$id' WHERE id='$data'";
    mysqli_query($this->conn, $query);
    return 1; 
    }
    public function deleteKategori($data){
    $sql="DELETE FROM kategori WHERE id=?";
    if($stmt=$this->prepare($sql)):
    $stmt->bind_param("i",$param_data);
    $param_data=$data;
    if($stmt->execute()):
    return true;
    else: 
    return false;
    endif;
    endif;
    $stmt->close();
    }
   }
   //akhir tambah kategori
   

   //tambah buku
   class Tambahbuku extends Connection{
    public function addbuku($id,$judul,$penerbit,$pengarang,$tahun,$kategori_id,$harga){
    $duplicate=mysqli_query($this->conn, "SELECT * FROM buku WHERE id ='$id'");
    if(mysqli_num_rows($duplicate)>0){
    return 10;
    //nik has already taken
    }
    else{
    if($judul==$judul){
    $query ="INSERT INTO buku (id, judul, penerbit, pengarang, tahun, kategori_id, harga) VALUES ('$id','$judul','$penerbit','$pengarang','$tahun', '$kategori_id','$harga')";
    mysqli_query($this->conn, $query);
    return 1;
    //register successful
    }
    else{
    return 100;
    //password does not match
                }
            }
        }
    }


class Crudbuku extends Connection {
    public function prepare($data){
        $perintah = $this->conn->prepare($data);
        if(!$perintah)die("Terjadi kesalahan pada prepare statement".$this->conn->error);
        return $perintah;
    }
public function query($data){
    $perintah = $this->conn->query($data);
    if(!$perintah)die("Terjadi kesalahan pada query statement".$this->conn->error);
        return $perintah;
    }
    public function insertbuku($id,$judul,$deskripsi,$penerbit,$pengarang,$tahun,$kategori_id,$harga){
    $query ="INSERT INTO buku (id, judul,deskripsi, penerbit, pengarang, tahun, kategori_id, harga) values ('$id','$judul','$penerbit','$pengarang','$tahun','$kategori_id','$harga')";
    mysqli_query($this->conn, $query);
    return 1; 
    }
    public function tampilbuku(){
    $sql="SELECT * from buku inner join kategori on buku.kategori_id = kategori.id";
    $perintah=$this->query($sql);
    return $perintah;
    }
    public function detailDatabuku($data){
    $sql="SELECT id, judul,deskripsi, penerbit, pengarang, tahun, kategori_id, harga FROM buku WHERE id=?";
    if($stmt=$this->conn->prepare($sql)):
    $stmt->bind_param("i",$param_data);
    $param_data=$data;
    if($stmt->execute()):
    $stmt->store_result();
    $stmt->bind_result($this->id, $this->judul,$this->deskeipsi,$this->penerbit,$this->pengarang,$this->tahun,$this->kategori_id,$this->harga);
    $stmt->fetch();
    if($stmt->num_rows==1):
    return true;
    else: 
    return false;
    endif;
    endif;
    endif; 
    $stmt->close();
    }
    public function updatebuku($id, $judul,$deskripsi, $penerbit, $pengarang, $tahun, $kategori_id, $harga){
    $query ="update buku set id='$id',judul='$judul', deskripsi='$deskripsi',penerbit='$penerbit', pengarang='$pengarang', tahun='$tahun', kategori_id='$kategori_id', harga='$harga' WHERE id='$id'";
    mysqli_query($this->conn, $query);
    return 1; 
    }
    public function deletebuku($data){
    $sql="DELETE FROM buku WHERE id=?";
    if($stmt=$this->prepare($sql)):
    $stmt->bind_param("i",$param_data);
    $param_data=$data;
    if($stmt->execute()):
    return true;
    else: 
    return false;
    endif;
    endif;
    $stmt->close();
    }

    public function searchBuku($keyword){
        $sql = "SELECT * FROM buku WHERE judul LIKE '%$keyword%' OR penerbit LIKE '%$keyword%' OR pengarang LIKE '%$keyword%' OR tahun LIKE '%$keyword%' OR kategori_id LIKE '%$keyword%' OR harga LIKE '%$keyword%'";
        $perintah = $this->conn->query($sql);
        return $perintah;
    }
   }
?>


