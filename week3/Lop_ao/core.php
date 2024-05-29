<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
        <?php
    abstract class Product {
        public $id;
        public $name;

        function __construct($id, $name) {
            $this->id = $id;
            $this->name = $name;
        }

        function set_id($id) {
            $this->id = $id;
        }
        function get_id($id){
            return $this ->id;
        }
        function set_name($name) {
            $this->name = $name;
        }
        function get_name($name){
            return $this ->name;
        }
        
        abstract function toString();
    }

    class Laptop extends Product {
        public $company;
        public $color;
        public $amount;
        public $price;
       
        function set_company($company) {
            $this->company = $company;
        }
        function get_company($company){
            return $this ->company;
        }
        function set_color($color) {
            $this->color = $color;
        }
        function get_color($color){
            return $this ->color;
        }
        function set_amount($amount) {
            $this->amount = $amount;
        }
        function get_amount($amount){
            return $this ->amount;
        }
        function set_price($price) {
            $this->price = $price;
        }
        function get_price($price){
            return $this ->price;
        }

        function __construct($id, $name, $company, $color, $amount, $price) {
            parent::__construct($id, $name);
            $this->company = $company;
            $this->color = $color;
            $this->amount = $amount;
            $this->price = $price;
        }

        function subtotal() {
            return $this->price * $this->amount;
        }

        public function toString() {
            $subtotal = $this->subtotal();
            return $this->id . "-" . $this->name . "-" . $this->company . "-" . $this->color . "-" . $this->amount . "-" . $this->price . "-" . $subtotal;
        }
    }
?>

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
