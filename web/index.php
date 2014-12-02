<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        final class Index {

            const DEFAULT_PAGE = 'home';
            const PAGE_DIRECTORY = '../page/';
            const LAYOUT_DIRECTORY = '../layout/';
            const EXTENSION = '.php';
            const USERNAME = 'userName';

            public function loadClass($name) {

                $classes = array(
                    'Config' => '../config/Config.php',
                    'Error' => '../validation/Error.php',
                    'Exception' => '../exception/NotFoundException.php',
                    'Flash' => '../flash/Flash.php',
//                    'FlightBookingValidator' => '../validation/FlightBookingValidator.php',
//                    'FlightBooking' => '../model/FlightBooking.php',
                    'Mapper' => '../mapping/Mapper.php',
                    'utils' => '../util/utils.php',
                    'Dao' => '../dao/Dao.php',
                    'UserDao' => '../dao/UserDao.php',
                    'CaptionDao' => '../dao/CaptionDao.php',
                    'ImageDao' => '../dao/ImageDao.php'
                );
                if (!array_key_exists($name, $classes)) {

                    die('Class "' . $name . '" not found.');
                }

                require_once $classes[$name];
            }

            function run() {

                $this->runPage($this->getPage());
                //$this -> doCRUD();
            }

            function runPage($page, array $extra = array()) {


                $run = false;



                if ($this->hasScript($page)) {

                    
                    require $this->getScript($page);
                }


                if ($this->hasTemplate($page)) {
                    $run = true;
                    $template = $this->getTemplate($page);
                    $loggedIn = $this->isLoggedIn();
                    require self::LAYOUT_DIRECTORY . 'index' . self::EXTENSION;
                    require self::LAYOUT_DIRECTORY . 'index-view' . self::EXTENSION;
                }



                if (!$run) {
                    die();
                }
            }

            function getPage() {

                $page = self::DEFAULT_PAGE;


                if (array_key_exists('page', $_GET)) {

                    $page = ($_GET['page']);
                }


                return $this->checkPage($page);
            }

            function checkPage($page) {

                if (!preg_match('/^[a-z0-9-]+$/i', $page)) {

                    throw new NotFoundException('Unsafe page "' . $page . '" requested');
                }


                if (!$this->hasScript($page) && !$this->hasTemplate($page)) {

                    throw new NotFoundException('Page "' . $page . '" not found');
                }
                return $page;
            }

            function hasScript($page) {

                return file_exists($this->getScript($page));
            }

            function hasTemplate($page) {

                return file_exists($this->getTemplate($page));
            }

            function getScript($page) {

                $page = self::PAGE_DIRECTORY . $page . self::EXTENSION;
                return $page;
            }

            function getTemplate($page) {

                $page = self::PAGE_DIRECTORY . $page . '-view' . self::EXTENSION;
                return $page;
            }

            public function handleException(Exception $ex) {


                $extra = array('message' => $ex->getMessage());


                if ($ex instanceof NotFoundException) {

                    $this->runPage('404', $extra);
                } else {
                    $this->runPage('500', $extra);
                }
            }

            private function doCRUD() {
                //create DAO object
                $dao = new FlightBookingDao();

                //create (insert into db)
                $flightBooking = new FlightBooking();
                $date = new DateTime("+1 day");
                $date->setTime(0, 0, 0);
                $flightBooking->setType("");
                $flightBooking->setMedicalCondition("");
                $flightBooking->setSpecialRequirement("");
                $savedFlightBooking = $dao->save($flightBooking);
                echo '<h2>Create</h2>New booking created. Id = ' . $savedFlightBooking->getId() . ".<br/>";

                //read               
                $booking = $dao->findById($savedFlightBooking->getId());
                echo '<h2>Read</h2>Booking retrieved from database. Id = ' . $booking->getId() . ".<br/>";

                //update (this booking already has an id, so it will be updated, not inserted
                $booking->setDuration(rand(30, 180));
                $dao->save($booking);
                echo '<h2>Update</h2>Booking updated with new duration. Id = ' . $booking->getId() . ", duration = " . $booking->getDuration() . ".<br/>";

                //delete (could remove from db, but have chosen to update the status to "VOIDED"
                //so that we can use the booking info in the future.
                $isVoided = $dao->delete($booking->getId());
                echo '<h2>Delete</h2>Booking voided = ' . $isVoided;
                $voidedBooking = $dao->findById($booking->getId());
                echo '. Id = ' . $booking->getId() . ", status = " . $voidedBooking->getStatus() . ".<br/>";
            }

            function init() {

                session_start();

                set_exception_handler(array($this, 'handleException'));

                spl_autoload_register(array($this, 'loadClass'));
            }

            private function isLoggedIn() {

                $loggedIn = false;

                if (isset($_SESSION[self::USERNAME])) {

                    $loggedIn = true;
                }

                return $loggedIn;
            }

        }

        $index = new Index();
        $index->init();
        $index->run();
        ?>
    </body>
</html>
