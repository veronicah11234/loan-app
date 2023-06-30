<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;


class LoanController extends Controller
{
    public function store(Request $request)
{

    // dd($request->all());

    $loan = new Loan();
    $loan->username = $request->input('username');
    $loan->email = $request->input('email');
    $loan->amount = $request->input('amount');
    $loan->phone = $request->input('phone');
    $loan->purpose = $request->input('purpose');
    $loan->terms = $request->input('terms');
    //dd($request->input('name'));
    $loan->save();

     return redirect('dashboard/loans')->with('success', 'Application successful. Please wait for approval.');
}

public function showLoans()
{
    // Assuming $loans is an array or collection containing loan data.
    $loans = Loan::all(); // Replace this with your actual data retrieval logic.

    return view('dashboard.loans', ['loans' => $loans]);
}

public function delete_loan(Loan $loan){
    $loan->delete();
    return redirect()->route('dashboard.loan')->with('success', "Deleted successfully.");
}
public function edit(Request $request, Loan $loan){
    $loan->update($request->only('username','email', 'amount', 'purpose','terms'));
    return redirect()->route('dashboard.loan')->with('success', "Deleted successfully.");
}

public function destroy(Loan $loan)
{
    $loan->delete();

    return redirect()->route('dashboard.loans')->with('success', 'Loan deleted successfully.');
}

public function loan(){
    $user_id = auth()->id();
    $user = User::find($user_id);
    $loans = $user->loans;

    return view('dashboard.loan', compact('loans'));
}


}