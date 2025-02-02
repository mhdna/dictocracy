<x-layout>
    <h3 class="text-4xl font-bold">Register bro</h3>

    <x-forms.form method="POST" action="/register" enctype="multipart/form-data">
        @csrf
        <x-forms.input label="Name" name="name" />
        <x-forms.input label="Email" name="email" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />

        <br />

        <!-- <x-forms.input label="Logo" name="logo" type="file" /> -->

        <x-forms.button>Create Account</x-forms.button>

    </x-forms.form>
</x-layout>
