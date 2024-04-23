<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Multi-sélection</title>
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            max-height: 200px;
            overflow-y: auto;
        }

        .dropdown-content label {
            display: block;
            padding: 10px;
        }

        .dropdown-content label:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>
    <form id="refForm" method="post" action="traitement.php">
        <div class="dropdown">
            <button class="dropdown-btn">Sélectionner les référentiels</button>
            <div class="dropdown-content">
                <label><input type="checkbox" name="referentiels[]" value="Dev web/mobile"> Dev web/mobile</label>
                <label><input type="checkbox" name="referentiels[]" value="Référent digital"> Référent digital</label>
                <label><input type="checkbox" name="referentiels[]" value="Dev data"> Dev data</label>
                <label><input type="checkbox" name="referentiels[]" value="Aws"> Aws</label>
                <label><input type="checkbox" name="referentiels[]" value="Hackeuse"> Hackeuse</label>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    document.getElementById('refForm').submit();
                });
            });
        });
    </script>

</body>

</html>