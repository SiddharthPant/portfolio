import AppLayout from "@/Layouts/AppLayout";
import { Head } from "@inertiajs/react";

export default function () {
    return (
        <AppLayout>
            <Head title="About" />

            <div className="bg-white py-24 sm:py-32">
                <div className="mx-auto max-w-7xl px-6 lg:px-8">
                    <div className="mx-auto max-w-2xl">
                        <h2 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                            About me
                        </h2>
                        <p className="mt-2 text-lg leading-8 text-gray-600">
                            Hi, I'm Siddharth. I write about web development,
                            programming, and tech. I'm a software engineer and
                            have been working with different tech stacks for the
                            last decade or so. Welcome to my personal cornor on
                            the internet...
                        </p>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
