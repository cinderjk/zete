<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\Contact;

class ExcelController extends Controller
{
    // import contact from excel file
    public function importContact(Request $request)
    {
        $file = $request->file('file');
        $collection = (new FastExcel)->import($file);
        foreach ($collection as $row) {
            $contact = Contact::create($row);
            $tags = explode(',', $row['tags']);
            foreach ($tags as $tag) {
                $contact->tags()->attach($tag);
            }
        }
        return redirect()->route('contacts.index')->with('message', 'Contacts imported successfully.');
    }
}
