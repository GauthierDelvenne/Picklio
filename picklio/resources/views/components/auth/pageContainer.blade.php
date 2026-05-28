<div class="auth">
    <x-form.form wire-submit="{{$wire}}" class="auth__form">
        {{$slot}}
    </x-form.form>
    <div class="auth__addInformation">
        <x-auth.imgContainer/>
        <p class="auth__addInformation__text">Un compte vous permet de composer votre panier, choisir votre créneau de retrait et recevoir votre confirmation par email. Vous ne payez qu'au moment du retrait, sur place.</p>
    </div>
</div>
