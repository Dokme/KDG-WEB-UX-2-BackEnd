<?php
    class Articles {
        public static function add($titel, $inhoud, $kernwoorden, $datum) {
            $sql = "INSERT INTO artikels SET titel = ?, inhoud = ?, kernwoorden = ?, datum = ?";

            try {
                $stmt = DB::getInstance()->prepare($sql);
                $stmt->execute([$titel, $inhoud, $kernwoorden, $datum]);
            } catch(PDOException $e) {
                echo $e->getMessage();
                die();
            }
            return true;
        }

        public static function update($id, $titel, $inhoud, $kernwoorden, $datum) {
            $sql = "UPDATE artikels SET titel = ?, inhoud = ?, kernwoorden = ?, datum = ? WHERE id = ?";

            try {
                $stmt = DB::getInstance()->prepare($sql);
                $stmt->bindParam(1, $titel, PDO::PARAM_STR);
                $stmt->bindParam(2, $inhoud, PDO::PARAM_STR);
                $stmt->bindParam(3, $kernwoorden, PDO::PARAM_STR);
                $stmt->bindParam(4, $datum, PDO::PARAM_STR);
                $stmt->bindParam(5, $id, PDO::PARAM_INT);

                $stmt->execute();
            } catch(PDOException $e) {
                echo $e->getMessage();
                die();
            }
            return true;
        }

        public static function get() {
            return DB::query('select * from artikels');
        }

        public static function getOne($id) {
            $sql = "SELECT * FROM artikels where id = ?";

            try {
                $stmt = DB::getInstance()->prepare($sql);
                $stmt->execute([$id]);
            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            return true;
        }
    }
?>