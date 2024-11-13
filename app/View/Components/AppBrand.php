<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppBrand extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
                <a href="/cardapio" wire:navigate>
                    <!-- Hidden when collapsed -->
                    <div {{ $attributes->class(["hidden-when-collapsed"]) }}>
                        <div class=" items-center gap-2">
                            <div class="hidden md:block mx-auto w-2/4">
                                <img src="/storage/logo.png" class=" text-center"/>
                            </div>
                            
                            <div class=" mx-auto">
                                <span class=" md:ml-3 font-bold text-2xl bg-gradient-to-r from-red-500 to-orange-300 bg-clip-text text-transparent ">
                                    Cozinha Gourmet
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Display when collapsed -->
                    <div class="display-when-collapsed hidden mx-5 mt-4 lg:mb-6 h-[28px]">
                        <x-icon name="s-square-3-stack-3d" class="w-6 -mb-1 text-purple-500" />
                    </div>
                </a>
            HTML;
    }
}
