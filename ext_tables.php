<?php
use TYPO3\CMS\Core\Http\ApplicationType;

defined('TYPO3') or die();
call_user_func(
    function () {
        if ($GLOBALS['TYPO3_REQUEST'] && ApplicationType::fromRequest($GLOBALS['TYPO3_REQUEST'])->isBackend()){
            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'Frappant.FrpFormAnswers',
                'web', // Make module a submodule of 'web'
                'formanswers', // Submodule key
                'after:FormFormbuilder', // Position
                [\Frappant\FrpFormAnswers\Controller\FormEntryController::class => 'list, show, prepareExport, export, deleteFormname, prepareRemove, remove'],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:frp_form_answers/Resources/Public/Icons/user_mod_formanswers.svg',
                    'labels' => 'LLL:EXT:frp_form_answers/Resources/Private/Language/locallang_formanswers.xlf',
                ]
            );
        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_frpformanswers_domain_model_formentry', 'EXT:frp_form_answers/Resources/Private/Language/locallang_csh_tx_frpformanswers_domain_model_formentry.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_frpformanswers_domain_model_formentry');
    }
);
