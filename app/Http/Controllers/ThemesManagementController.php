<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class ThemesManagementController extends Controller
{
    public function template()
    {
        return View('themesmanagement.template');
    }
}
