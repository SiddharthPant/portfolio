import { Head, Link } from "@inertiajs/react";
import AppLayout from "@/Layouts/AppLayout";
import { StatusCodePhrases } from "@/Utils/errorCodes";

export default function Error({ status }: { status: number }) {
    const { reason, description } =
        StatusCodePhrases[status] || StatusCodePhrases[500];
    return (
        <AppLayout>
            <Head title={`${status}: ${reason}`} />
            <main className="mx-auto flex w-full max-w-7xl flex-auto flex-col justify-center px-6 py-24 sm:py-64 lg:px-8">
                <p className="text-base font-semibold leading-8 text-indigo-600">
                    {status}
                </p>
                <h1 className="mt-4 text-pretty text-5xl font-semibold tracking-tight text-gray-900 sm:text-6xl">
                    {reason}
                </h1>
                <p className="mt-6 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">
                    {description}
                </p>
                <div className="mt-10">
                    <Link
                        href={route("index")}
                        className="text-sm font-semibold leading-7 text-indigo-600"
                    >
                        <span aria-hidden="true">&larr;</span> Back to home
                    </Link>
                </div>
            </main>
        </AppLayout>
    );
}
