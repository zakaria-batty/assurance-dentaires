<?php

// function for calculation of refund amount
function Montant()
{
    $date = $_POST['date-naissance'];
    $today = date("d-m-Y");
    $diff = date_diff(date_create($date), date_create($today));
    $age = $diff->format('%y');
    global $Montant;

    // variables
    $Rbsmnt_CQ = 70 / 100;
    $tarif_Detartrage = 29.92;

    $plus13_carie1 = 16.87;
    $plus13_carie2 = 28.92;
    $plus13_carie3 = 40.97;
    $plus13_canine = 33.74;
    $plus13_Premolaire = 48.2;
    $plus13_Molaire = 81.94;

    $moin13_carie1 = 19.28;
    $moin13_carie2 = 33.37;
    $moin13_carie3 = 48.2;
    $moin13_canine = 38.56;
    $moin13_Premolaire = 57.84;
    $moin13_Molaire = 93.99;

    $dent_de_lait = 16.72;
    $dent_de_permanente = 33.44;
    $Scellement_de_sillon = 21.69;

    $Chirurgien_dentiste = 21;
    $stomatoloque8S1 = 28;
    $stomatoloque_S2 = 23;

    $tarif_conv = $_POST['tarif-convotion'];
    $tarif_couronnes = 107.5;
    $tarif_bridge = 279.5;
    $tarif_appareil = 64.5;
    $tarif_appareil14 = 182.5;
    $tarif_travaux = 193.5;
    $Nbr = isset($_POST['nbr']) ? $_POST['nbr'] : NULL;
    $Montant = "";


    // Coditions for choosing doctors
    switch ($_POST['soin-dentaire']) {
        case 'Detartrage':
            $Montant = $tarif_Detartrage * $Rbsmnt_CQ;
            break;

        case 'Traitement carie 1 face':
            if ($age > 13) :
                $Montant = $plus13_carie1 * $Rbsmnt_CQ;
            else :
                $Montant = $moin13_carie1 * $Rbsmnt_CQ;
            endif;
            break;

        case 'Traitement carie 2 face':
            if ($age > 13) :
                $Montant = $plus13_carie2 * $Rbsmnt_CQ;
            else :
                $Montant = $moin13_carie2 * $Rbsmnt_CQ;
            endif;
            break;
        case 'Traitement carie 3 faces et +':
            if ($age > 13) :
                $Montant = $plus13_carie3 * $Rbsmnt_CQ;
            else :
                $Montant = $moin13_carie3 * $Rbsmnt_CQ;
            endif;
            break;
        case 'Devitalisation(canine ou incisive)':
            if ($age > 13) :
                $Montant  = $plus13_canine * $Rbsmnt_CQ;
            else :
                $Montant = $moin13_canine * $Rbsmnt_CQ;
            endif;
            break;
        case 'Devitalisation(Premolaire)':
            if ($age > 13) :
                $Montant = $plus13_Premolaire * $Rbsmnt_CQ;
            else :
                $Montant = $moin13_Premolaire * $Rbsmnt_CQ;
            endif;
            break;
        case 'Devitalisation(Molaire)':
            if ($age > 13) :
                $Montant = $plus13_Molaire * $Rbsmnt_CQ;
            else :
                $Montant = $moin13_Molaire * $Rbsmnt_CQ;
            endif;
            break;
        case 'Extraction dent de lait':
            $Montant = $dent_de_lait * $Rbsmnt_CQ;
            break;
        case 'Extraction dent de permanente':
            $Montant = $dent_de_permanente * $Rbsmnt_CQ;
            break;
        case 'Scellement de sillon':
            $Montant = $Scellement_de_sillon * $Rbsmnt_CQ;
            break;
        default:
            break;
    }

    switch ($_POST['Consultation-normale']) {
        case 'Chirurgien dentiste':
            $Montant = $Chirurgien_dentiste * $Rbsmnt_CQ;
            break;
        case 'stomatoloque (secteur 1)':
            $Montant = $stomatoloque8S1 * $Rbsmnt_CQ;
            break;
        case 'stomatoloque (secteur 2)':
            $Montant = $stomatoloque_S2 * $Rbsmnt_CQ;
            break;
        default:
            break;
    }

    switch ($_POST['Travaux-dentaire']) {
        case 'Couronnes':
            $Montant = $tarif_couronnes * $Rbsmnt_CQ *  $Nbr;
            break;
        case 'Bridge 3elements':
            $Montant = $tarif_bridge * $Rbsmnt_CQ *  $Nbr;
            break;
        case 'Appareil dentaire(1a3dents)':
            $Montant = $tarif_appareil * $Rbsmnt_CQ;
            break;
        case 'Appareil dentaire(14dents)':
            $Montant = $tarif_appareil14 * $Rbsmnt_CQ;
            break;
        case 'Travaux dorthodontie':
            if ($age > 16) :
                $Montant = $tarif_conv;
            else :
                $Montant = $tarif_travaux *  $Rbsmnt_CQ *  $Nbr;
            endif;
            break;
        default:
            break;
    }

    echo $Montant . " €";
}
// function for calculation Garantie
function Garantie()
{
    global $Garantie;

    $date = $_POST['date-naissance'];
    $today = date("d-m-Y");
    $diff = date_diff(date_create($date), date_create($today));
    $age = $diff->format('%y');
    // variables
    $Garantie = isset($_POST['Garantie']) ? $_POST['Garantie'] : NULL;
    $tarif_Detartrage = 29.92;
    $plus13_carie1 = 16.87;
    $plus13_carie2 = 28.92;
    $plus13_carie3 = 40.97;
    $plus13_canine = 33.74;
    $plus13_Premolaire = 48.2;
    $plus13_Molaire = 81.94;
    $moin13_carie1 = 19.28;
    $moin13_carie2 = 33.37;
    $moin13_carie3 = 48.2;
    $moin13_canine = 38.56;
    $moin13_Premolaire = 57.84;
    $moin13_Molaire = 93.99;
    $dent_de_lait = 16.72;
    $dent_de_permanente = 33.44;
    $Scellement_de_sillon = 21.69;

    $Chirurgien_dentiste = 21;
    $stomatoloque8S1 = 28;
    $stomatoloque_S2 = 23;

    $tarif_conv = $_POST['tarif-convotion'];
    $tarif_couronnes = 107.5;
    $tarif_bridge = 279.5;
    $tarif_appareil = 64.5;
    $tarif_appareil14 = 182.5;
    $tarif_travaux = 193.5;
    $Nbr = isset($_POST['nbr']) ? $_POST['nbr'] : NULL;

    switch ($_POST['Travaux-dentaire']) {
        case 'Couronnes':
            $Garantie = $tarif_couronnes * $Garantie / 100 *  $Nbr;
            break;
        case 'Bridge 3elements':
            $Garantie = $tarif_bridge * $Garantie / 100 *  $Nbr;
            break;
        case 'Appareil dentaire(1a3dents)':
            $Garantie = $tarif_appareil * $Garantie / 100;
            break;
        case 'Appareil dentaire(14dents)':
            $Garantie = $tarif_appareil14 * $Garantie / 100;
            break;
        case 'Travaux dorthodontie':
            if ($age > 16) :
                $Garantie = $tarif_conv;
            else :
                $Garantie = $tarif_travaux *  $Garantie / 100  *  $Nbr;
            endif;
            break;
        default:
            break;
    }

    switch ($_POST['soin-dentaire']) {
        case 'Detartrage':
            $Garantie = $tarif_Detartrage * $Garantie / 100;
            break;

        case 'Traitement carie 1 face':
            if ($age > 13) :
                $Garantie = $plus13_carie1 * $Garantie / 100;
            else :
                $Garantie = $moin13_carie1 * $Garantie / 100;
            endif;
            break;

        case 'Traitement carie 2 face':
            if ($age > 13) :
                $Garantie = $plus13_carie2 * $Garantie / 100;
            else :
                $Garantie = $moin13_carie2 * $Garantie / 100;
            endif;
            break;
        case 'Traitement carie 3 faces et +':
            if ($age > 13) :
                $Garantie = $plus13_carie3 * $Garantie / 100;
            else :
                $Garantie = $moin13_carie3 * $Garantie / 100;
            endif;
            break;
        case 'Devitalisation(canine ou incisive)':
            if ($age > 13) :
                $Garantie  = $plus13_canine * $Garantie / 100;
            else :
                $Garantie = $moin13_canine * $Garantie / 100;
            endif;
            break;
        case 'Devitalisation(Premolaire)':
            if ($age > 13) :
                $Garantie = $plus13_Premolaire * $Garantie / 100;
            else :
                $Garantie = $moin13_Premolaire * $Garantie / 100;
            endif;
            break;
        case 'Devitalisation(Molaire)':
            if ($age > 13) :
                $Garantie = $plus13_Molaire * $Garantie / 100;
            else :
                $Garantie = $moin13_Molaire * $Garantie / 100;
            endif;
            break;
        case 'Extraction dent de lait':
            $Garantie = $dent_de_lait * $Garantie / 100;
            break;
        case 'Extraction dent de permanente':
            $Garantie = $dent_de_permanente * $Garantie / 100;
            break;
        case 'Scellement de sillon':
            $Garantie = $Scellement_de_sillon * $Garantie / 100;
            break;
        default:
            break;
    }

    switch ($_POST['Consultation-normale']) {
        case 'Chirurgien dentiste':
            $$Garantie = $Chirurgien_dentiste * $Garantie / 100;
            break;
        case 'stomatoloque (secteur 1)':
            $$Garantie = $stomatoloque8S1 * $Garantie / 100;
            break;
        case 'stomatoloque (secteur 2)':
            $$Garantie = $stomatoloque_S2 * $Garantie / 100;
            break;
        default:
            break;
    }

    echo $Garantie . " €";
}

// function for calculation Rembourse
function Rembourse()
{
    global $Garantie;
    global $Montant;
    global $Rembourse;
   
    $tarif_conv = $_POST['tarif-convotion'];
    $sum = $Garantie +  $Montant;

        if ($sum  > $tarif_conv) :
            $Rembourse = $tarif_conv;
        else :
            $Rembourse = $sum;
        endif;

    echo $Rembourse . " €";
}
// function for calculation Total
function Total()
{
    global $Rembourse;

    $tarif_conv = $_POST['tarif-convotion'];
    $Total = $tarif_conv - $Rembourse;
    echo $Total . "€";
}
