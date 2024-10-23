import AppLayout from "@/Layouts/AppLayout";
import { Head } from "@inertiajs/react";
import { PageProps, Post } from "@/types";
import Markdown from "markdown-to-jsx";
import { H1, H2, P } from "@/Components/MarkdownElements";
import { format } from "date-fns";

export default function ({ auth, post }: PageProps<{ post: Post }>) {
    return (
        <AppLayout>
            <Head title={post.title} />
            <div className="bg-white px-6 py-32 lg:px-8">
                <div className="mx-auto max-w-3xl text-base leading-7 text-gray-700">
                    <p className="text-xs leading-7 text-indigo-500">
                        {post.published_at
                            ? format(new Date(post.published_at), "PPPp")
                            : "Date not available"}
                    </p>
                    <h1 className="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                        {post.title}
                    </h1>
                    <div className="mt-10 max-w-2xl">
                        <Markdown
                            options={{
                                overrides: {
                                    p: P,
                                    h1: H1,
                                    h2: H2,
                                },
                            }}
                        >
                            {post.body}
                        </Markdown>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
