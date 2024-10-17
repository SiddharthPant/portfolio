import AppLayout from "@/Layouts/AppLayout";
import { Head, Link } from "@inertiajs/react";
import { Paginate, Post } from "@/types";
import { formatDistance } from "date-fns";

export default function ({ posts }: { posts: Paginate<Post> }) {
    return (
        <AppLayout>
            <Head title="Home" />

            <div className="bg-white py-24 sm:py-32">
                <div className="mx-auto max-w-7xl px-6 lg:px-8">
                    <div className="mx-auto max-w-2xl">
                        <h2 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                            From the blog
                        </h2>
                        <p className="mt-2 text-lg leading-8 text-gray-600">
                            Learn how to grow your business with our expert
                            advice.
                        </p>
                        <div className="mt-10 space-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16">
                            {posts.data.map((post) => (
                                <article
                                    key={post.id}
                                    className="flex max-w-xl flex-col items-start justify-between"
                                >
                                    <div className="flex items-center gap-x-4 text-xs">
                                        <time
                                            dateTime={post.published_at!}
                                            className="text-gray-500"
                                        >
                                            {formatDistance(
                                                new Date(post.published_at!),
                                                new Date(),
                                                { addSuffix: true },
                                            )}
                                        </time>
                                        {post.tags.map((tag) => (
                                            <Link
                                                href="#"
                                                className="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                                            >
                                                {tag.name}
                                            </Link>
                                        ))}
                                    </div>
                                    <div className="group relative">
                                        <h3 className="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                            <a href="#">
                                                <span className="absolute inset-0" />
                                                {post.title}
                                            </a>
                                        </h3>
                                        <p className="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                            {post.stripped_content}
                                        </p>
                                    </div>
                                </article>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
