<?php

function redirectAccordingToRequest($request, $status = 'Success')
{

    $message = __("translation.Messages.Success.Operation Successfully");

    if ($status == 'Error') {
        $status = 'Error';
        $message = __("translation.Messages.Error.Operation Failed");
    }
    $parentRouet = explode(".", $request->route()->getName())[0]; // to get parent route name to make automatic redirection
    if ($request->input('redirect') == 'table')
        return redirect()->route($parentRouet . '.index')->with($status, $message);
    elseif ($request->input('redirect') == 'back')
        return redirect()->back()->with($status, $message);
    else
        return redirect()->back()->with($status, $message);
}



function requestAbstraction($request)
{
    return $request->except('_token', '_method', 'redirect');
}

function requestAbstractionWithMedia($request)
{
    return $request->except('_token', '_method', 'redirect', 'media');
}

function returnMessage()
{
}
