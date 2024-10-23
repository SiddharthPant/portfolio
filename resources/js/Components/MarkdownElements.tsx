import { HTMLAttributes } from "react";

export function P({
    className = "",
    ...props
}: HTMLAttributes<HTMLParagraphElement>) {
    return <p {...props} className={"mt-6" + className}></p>;
}

export function H1({
    className = "",
    ...props
}: HTMLAttributes<HTMLHeadingElement>) {
    return (
        <h1
            {...props}
            className={
                "mt-16 text-pretty text-5xl font-semibold tracking-tight text-gray-900" +
                className
            }
        ></h1>
    );
}

export function H2({
    className = "",
    ...props
}: HTMLAttributes<HTMLHeadingElement>) {
    return (
        <h2
            {...props}
            className={
                "mt-12 text-pretty text-3xl font-semibold tracking-tight text-gray-900" +
                className
            }
        ></h2>
    );
}
