<?php

class Login extends Dbh {

    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare("SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?");

        if(!$stmt->execute(array($uid, $uid))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed1");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound1");
            exit();
        }

        $stmtFetchAll = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pwdHashed = $stmtFetchAll[0]["users_pwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);
        

        if($checkPwd == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif($checkPwd == true) {
            $stmt = null;
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?");

            if(!$stmt->execute(array($uid, $uid, $pwd))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed2");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound2");
                exit();
            }

            $stmtFetchAll = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $userId = $stmtFetchAll[0]["users_id"];
            $userUid = $stmtFetchAll[0]["users_uid"];

            session_start();
            $_SESSION["userid"] = $userId;
            $_SESSION["useruid"] = $userUid;

            $stmt = null;
        }
        $stmt = null;
    }

}