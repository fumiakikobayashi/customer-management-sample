import Link from "next/link"
import { ReactNode } from "react"

const Layout = ({ children }: Props) => {
    return (
        <div>
            <nav className="flex flex-rows p-4 bg-black text-white">
                <Link href="/">
                    <a>顧客管理</a>
                </Link>
            </nav>
            {children}
        </div>
    );
};

type Props = {
    children?: ReactNode
};

export default Layout
