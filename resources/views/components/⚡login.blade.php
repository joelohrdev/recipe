<?php

use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component {
    #[Validate('required|string|max:4|min:4')]
    public string $code = '';
    public bool $error = false;

    public function verify(): true|RedirectResponse
    {
        $this->validate();

        if ($this->code === config('pin.code')) {
            session(['pin_authenticated' => true]);

            return redirect()->intended(route('home'));
        }

        $this->code = '';

        return $this->error = true;
    }
};
?>

<div>
    <form wire:submit="verify" class="space-y-8">
        <div class="max-w-64 mx-auto space-y-2">
            <flux:heading size="lg" class="text-center">Verify your account</flux:heading>
            <flux:text class="text-center">Please enter the passcode to access the recipes.</flux:text>
        </div>

        <div class="space-y-6">
            <flux:otp wire:model="code" length="4" submit="auto" private class="mx-auto"/>
            @if($error)
                <p class="text-red-500">The wrong pin has been entered.</p>
            @endif
        </div>
    </form>
</div>
