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
//                    'CreateAccountValidator' => '../validation/CreateAccountValidator.php',
                    'Image' => '../model/Image.php',
                    'Caption' => '../model/Caption.php',
                    'Mapper' => '../mapping/Mapper.php',
                    'Utils' => '../util/Utils.php',
                    'Dao' => '../dao/Dao.php',
                    'UserDao' => '../dao/UserDao.php',
                    'CaptionDao' => '../dao/CaptionDao.php',
                    'ImageDao' => '../dao/ImageDao.php',
                    'Uploader' => '../upload/Uploader.php'
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
