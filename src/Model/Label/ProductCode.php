<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

/**
 * Values accepted by `letter.service.productCode` (see "Produits disponibles" in the SLS documentation).
 */
final class ProductCode
{
    // France
    public const string DOM = 'DOM'; // Colissimo Domicile sans signature (also international)
    public const string DOS = 'DOS'; // Colissimo Domicile avec signature (also international)
    public const string HD = 'HD'; // Hors domicile: generic code for every pick-up point (national & international)
    public const string BPR = 'BPR'; // Point Retrait en bureau de poste
    public const string A2P = 'A2P'; // Point Retrait en relais Pickup / consigne Pickup Station
    public const string CORE = 'CORE'; // Colissimo Retour France
    public const string COLR = 'COLR'; // Colissimo Flash sans signature
    public const string J_PLUS_1 = 'J+1'; // Colissimo Flash avec signature
    public const string CECO = 'CECO'; // Colissimo France Eco / Domicile Essentiel
    public const string COPLAT = 'COPLAT';
    public const string COPLAT_J1 = 'COPLAT_J1';
    public const string COLL = 'COLL';

    // Outre-Mer
    public const string COM = 'COM'; // Domicile sans signature
    public const string CDS = 'CDS'; // Domicile avec signature
    public const string ECO = 'ECO'; // Colissimo Eco OM

    // International
    public const string CMT = 'CMT'; // Point Retrait en relais
    public const string PCS = 'PCS'; // Point Retrait en consigne Pickup Station
    public const string BDP = 'BDP'; // Point Retrait en bureau de poste
    public const string CORI = 'CORI'; // Retour International (vers la France) / Retour OM
    public const string CORF = 'CORF'; // Retour International (France vers l'étranger)
    public const string ACCI = 'ACCI';
}
