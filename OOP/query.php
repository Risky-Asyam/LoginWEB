<?php
class crud extends koneksi
{
    public function lihatData()
    {
        $sql = "SELECT * FROM user_detail";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
    public function insertData($email, $pass, $name)
    {
        try {
            $sql = "INSERT INTO user_detail(user_email, user_password, user_fullname, level) VALUES (:email, :pass, :name, 2)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function lihatDataById($id)
    {
        try {
            $sql = "SELECT * FROM user_detail WHERE id = :id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function updateData($id, $email, $fullname)
    {
        try {
            $sql = "UPDATE user_detail SET user_email = :email, user_fullname = :fullname WHERE id = :id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id", $id);
            $result->bindParam(":email", $email);
            $result->bindParam(":fullname", $fullname);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function hapusData($id)
    {
        try {
            $sql = "DELETE FROM user_detail WHERE id = :id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function cekLogin($email, $password)
{
    try {
        $sql = "SELECT * FROM user_detail WHERE user_email = :email";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":email", $email);
        $result->execute();

        if ($result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $storedPassword = $row['user_password'];

            // Verifikasi password
            if ($password === $storedPassword) {
                return $row; // Mengembalikan data pengguna jika login berhasil
            } else {
                return false; // Password salah
            }
        } else {
            return false; // Email tidak ditemukan
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
}
