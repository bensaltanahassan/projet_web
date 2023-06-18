<!DOCTYPE html>
<html>

<head>
    <title>Payment Page</title>
    <script src="https://kit.fontawesome.com/67f59e0eca.js" crossorigin="anonymous"></script>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Include your custom CSS -->
    <style>
        .align-right {
            text-align: right;
        }
    </style>


</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Details De Paymernt</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Payment Information -->
                                <h6>Information De Payment</h6>
                                <div class="form-group">
                                    <label for="card_number">Numéro De Carte Bancaire</label>
                                    <input type="text" class="form-control" id="card_number" name="card_number" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="expiry_date">Date d'Expiration</label>
                                        <input type="text" class="form-control" id="expiry_date" name="expiry_date" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cvv">CVV</label>
                                        <input type="text" class="form-control" id="cvv" name="cvv" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">CNom du Porteur De La Carte</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <!-- Billing Address -->
                                <h6>Adresse De Livraison</h6>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city">Ville</label>
                                        <input type="text" class="form-control" id="city" name="city" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="zip">ZIP Code</label>
                                        <input type="text" class="form-control" id="zip" name="zip" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 align-right card w-75">
                                <!-- Selected Items from Cart -->
                                <div class="card-body">
                                    <img width="60" height="60" src="https://img.icons8.com/ios-glyphs/90/shopping-cart--v1.png" alt="shopping-cart--v1" />
                                    <br><br>
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold" style="font-weight: bold;">Produit 1</div>
                                                Prix: 200dh
                                            </div>
                                            <span class="badge bg-primary rounded-pill">14</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold" style="font-weight: bold;">Produit 1</div>
                                                Prix: 200dh
                                            </div>
                                            <span class="badge bg-primary rounded-pill">1</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold" style="font-weight: bold;">Produit 1</div>
                                                Prix: 200dh
                                            </div>
                                            <span class="badge bg-primary rounded-pill">3</span>
                                        </li>
                                    </ol>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Acheter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper