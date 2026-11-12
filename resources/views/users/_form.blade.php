@csrf

<div style="margin-bottom: 20px;">
    <label for="username"
           style="display: block; margin-bottom: 8px;">
        Username *
    </label>

    <input
        type="text"
        id="username"
        name="username"
        value="{{ old('username', $user->username ?? '') }}"
        maxlength="50"
        required
        style="width: 100%; box-sizing: border-box;
               padding: 12px; border: 1px solid #DCCED5;
               border-radius: 8px;"
    >

    @error('username')
        <p style="color: #B42318; font-size: 13px; margin-top: 6px;">
            {{ $message }}
        </p>
    @enderror
</div>

<div style="margin-bottom: 24px;">
    <label for="full_name"
           style="display: block; margin-bottom: 8px;">
        Full Name *
    </label>

    <input
        type="text"
        id="full_name"
        name="full_name"
        value="{{ old('full_name', $user->full_name ?? '') }}"
        maxlength="100"
        required
        style="width: 100%; box-sizing: border-box;
               padding: 12px; border: 1px solid #DCCED5;
               border-radius: 8px;"
    >

    @error('full_name')
        <p style="color: #B42318; font-size: 13px; margin-top: 6px;">
            {{ $message }}
        </p>
    @enderror
</div>

<div style="display: flex; gap: 16px; align-items: center;">
    <button
        type="submit"
        style="background: #A64D79; color: white;
               border: none; border-radius: 8px;
               padding: 12px 20px; cursor: pointer;
               font: inherit;"
    >
        {{ $buttonText }}
    </button>

    <a href="{{ route('users') }}"
       style="color: #8E526D; text-decoration: none;">
        Cancel
    </a>
</div>