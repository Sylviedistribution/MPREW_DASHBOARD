<?php

enum Statut: string
{
    // Statuts des transactions
    case TransactionEnAttente = 'Transaction - En attente';
    case TransactionReussie = 'Transaction - Réussie';
    case TransactionEchouee = 'Transaction - Échouée';

    // Statuts des commandes
    case CommandeEnCours = 'Commande - En cours';
    case CommandeTerminee = 'Commande - Terminée';
    case CommandeAnnulee = 'Commande - Annulée';

    // Statuts des paiements
    case PaiementNonPaye = 'Paiement - Non payé';
    case PaiementPaye = 'Paiement - Payé';
    case PaiementRembourse = 'Paiement - Remboursé';
}
