<?php

namespace App\Helpers;

class Componentes
{

    public static function boton($idx, $body, $data='', $evento = null)
    {
        $html = <<<EOT
        <button id="{$idx}" onclick="{$evento}" {$data} 
        class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex sm:ml-3 mt-0 items-start justify-start px-5 py-2 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded border border-indigo-950"
        >{$body}</button>
EOT;
        return $html;
    }

    //@static = false|true"
    public static function modal($idx, $titulo, $body, $static=false,  $close = true,$size = 'm')
    {
        $cerrar='';
        if($close){
            $cerrar=<<<EOT
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{$idx}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
EOT;
        }
        $static = $static?'data-modal-backdrop="static"':'';
        $html = <<<EOT
    <div id="{$idx}" tabindex="-1" {$static} data-modal-closable="false" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg border-2 border-white shadow dark:bg-gray-700">
        
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {$titulo}
                </h3>
                {$cerrar}
            </div>

            <!-- Modal body -->
            <div class="p-6 space-y-6">
               {$body}
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-3 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="{$idx}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="{$idx}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-sm border border-gray-200 text-sm font-medium px-5 py-1.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>
EOT;

return $html;
    }
}
