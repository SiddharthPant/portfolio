import AppLayout from "@/Layouts/AppLayout";
import { Head } from "@inertiajs/react";
import { PageProps, Post } from "@/types";
import Markdown from "markdown-to-jsx";

export default function ({ auth, post }: PageProps<{ post: Post }>) {
    return (
        <AppLayout>
            <Head title={post.title} />
            <div className="mx-auto max-w-7xl px-6 lg:px-8">
                <h1 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    {post.title}
                </h1>
                <Markdown>{post.body}</Markdown>
                {post.html}
            </div>
        </AppLayout>
    );
}
