<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

    <div class="contaner">
        <div class="row">
            <div class="col-lg-6  mx-auto mb-4 bg-light text-dark" style="margin: 20px;">

                <?php if (isset($_POST["Nom"])) {
                    include("./include/index.php"); ?>
                    <table class="table table-striped">
                        <a href="index.php" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                        <thead>
                            <tr>
                                <th>Remboursement CQ</th>
                                <th>Garantie</th>
                                <th>Montant Remboursé</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php Montant(); ?></td>
                                <td><?php if ($_POST['Garantie']) : Garantie();
                                    else : echo  0 . ' €';
                                    endif; ?></td>
                                <td><?php if ($_POST['Garantie']) : Rembourse();
                                    else : echo  0 . ' €';
                                    endif; ?></td>
                                <td><?php if ($_POST['Garantie']) : Total();
                                    else : echo  0 . ' €';
                                    endif; ?></td>
                            </tr>

                        </tbody>
                    </table>

                <?php } else { ?>
                    <div class="title ">
                        <h5 class="title" style="margin-top: 10px; text-align: center;">
                            Choissez votre type de consultation
                        </h5>
                    </div>
                    <form class="mt-4" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-row">
                            <div class="form-check mx-auto mb-4">
                                <div class="form-check form-check-inline">
                                    <input onclick=" Evnt('Travaux')" class="form-check-input" type="radio" name="checked" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Travaux dentaire
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input onclick=" Evnt('consultation')" class="form-check-input" type="radio" name="checked" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Consultation normale
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input onclick=" Evnt('soindentaire')" class="form-check-input" type="radio" name="checked" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        soin dentaire
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nom*</label>
                                <input type="text" name="Nom" class="form-control" required placeholder="Nom*">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Prénom*</label>
                                <input type="text" name="Prenom" class="form-control" required placeholder="Prénom*">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Téléphone*</label>
                                <input type="numbre" name="Telephone" class="form-control" required placeholder="Téléphpne*">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email*</label>
                                <input type="email" name="Email" class="form-control" required placeholder="Email*">
                            </div>

                            <div class="form-group col-md-6" id="Travaux-dentaire" style="display: none;">
                                <label for="">Travaux dentaire*</label>
                                <select name="Travaux-dentaire" id="activities" class="form-control">
                                    <option selected>Choose...</option>
                                    <option value="Couronnes">Couronnes</option>
                                    <option value="Bridge 3elements">Bridge 3elements</option>
                                    <option value="Appareil dentaire(1a3dents)">Appareil dentaire (1 a 3 dents)</option>
                                    <option value="Appareil dentaire(14dents)">Appareil dentaire ( 14 dents)</option>
                                    <option value="Travaux dorthodontie">Travaux d'orthodontie</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6" id="Consultation-normale" style="display: none;">
                                <label for="">Consultation normale*</label>
                                <select name="Consultation-normale" class="form-control">
                                    <option selected>Choose...</option>
                                    <option value="Chirurgien dentiste">Chirurgien dentiste</option>
                                    <option value="stomatoloque (secteur 1)">stomatoloque (secteur 1)</option>
                                    <option value="stomatoloque (secteur 2)">stomatoloque (secteur 2)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6" id="soin-dentaire" style="display: none;">
                                <label for="">Soin dentaire*</label>
                                <select name="soin-dentaire" class="form-control">
                                    <option selected>Choose...</option>
                                    <option value="Detartrage">Detartrage</option>
                                    <option value="Traitement carie 1 face">Traitement carie 1 face</option>
                                    <option value="Traitement carie 2 face">Traitement carie 2 face</option>
                                    <option value="Traitement carie 3 faces et +">Traitement carie 3 faces et +</option>
                                    <option value="Devitalisation(canine ou incisive)">Devitalisation(canine ou incisive)</option>
                                    <option value="Devitalisation(Premolaire)">Devitalisation(Premolaire)</option>
                                    <option value="Devitalisation(Molaire)">Devitalisation(Molaire)</option>
                                    <option value="Extraction dent de lait">Extraction dent de lait</option>
                                    <option value="Extraction dent de permanente">Extraction dent de permanente</option>
                                    <option value="Scellement de sillon">Scellement de sillon</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputPassword4">tarif Consultation*</label>
                                <input type="text" name="tarif-convotion" class="form-control" required placeholder="Tarif Consultation">
                            </div>
                            <div class="form-group col-md-6" id="Garantie" style="display: none;">
                                <label for="inputState">Garantie</label>
                                <select id="inputState" name="Garantie" class="form-control">
                                    <option value="0">Choose...</option>
                                    <option value="100">100%</option>
                                    <option value="125">125%</option>
                                    <option value="150">150%</option>
                                    <option value="150">175%</option>
                                    <option value="200">200%</option>
                                    <option value="250">250%</option>
                                    <option value="300">300%</option>
                                    <option value="400">400%</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Date de naissance*</label required>
                                <input type="date" name="date-naissance" class="form-control"  placeholder="Tarif Consultation" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" id="Nbr" name="nbr" style="display: none;" class="form-control">
                            </div>
                        </div>

                        <button type="submit" name="comparer" class="btn btn-success btn-block mb-4">Calculer le montant de remboursement</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>